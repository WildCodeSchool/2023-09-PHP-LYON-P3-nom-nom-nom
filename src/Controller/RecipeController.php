<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Recipe;
use App\Entity\Step;
use App\Form\CommentType;
use App\Form\RecipeType;
use App\Repository\CategoryRepository;
use App\Repository\CommentRepository;
use App\Repository\RecipeRepository;
use App\Repository\UserRepository;
use App\Service\AccessControl;
use App\Service\DeleteButtonService;
use App\Service\UpdateNumberService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/recettes')]
class RecipeController extends AbstractController
{
    private AccessControl $accessControl;
    private DeleteButtonService $deleteButtonService;
    private UpdateNumberService $updateNumberService;

    public function __construct(
        AccessControl $accessControl,
        DeleteButtonService $deleteButtonService,
        UpdateNumberService $updateNumberService,
    ) {
        $this->accessControl = $accessControl;
        $this->deleteButtonService = $deleteButtonService;
        $this->updateNumberService = $updateNumberService;
    }
    #[Route('/', name: 'app_recipe_index', methods: ['GET'])]
    public function index(
        RecipeRepository $recipeRepository,
        CategoryRepository $categoryRepository,
    ): Response {
        $recipes = [];
        $categories = $categoryRepository->findAll();
        foreach ($categories as $category) {
            // Fetch only 6 recipes for each category
            $recipes[$category->getId()] = $recipeRepository->findBy(
                ['category' => $category],
                ['id' => 'DESC'],
                6
            );
        }
        $totalRecipes = $recipeRepository->countRecipes();
        return $this->render('recipe/index.html.twig', [
            'categories' => $categories,
            'totalRecipes' => $totalRecipes,
            'recipes' => $recipes,
        ]);
    }

    #[Route('/nouvelle', name: 'app_recipe_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        MailerInterface $mailer,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ): Response {
        // call the AccessControl service => control if there is a connection
        $userLoggedIn = $this->accessControl->checkIfUserLoggedIn();
        if ($userLoggedIn !== true) {
            $this->addFlash('danger', 'Connectez-vous pour accéder à cette ressource.');

            return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }

        $number = 0;
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $slug = $slugger->slug($recipe->getNameRecipe());
            $recipe->setSlug($slug);
            foreach ($recipe->getSteps() as $step) {
                $step->setRecipe($recipe);
                $step->setStepNumber($number += 1);
                $entityManager->persist($step);
            }
            foreach ($recipe->getIngredients() as $ingredient) {
                $ingredient->setRecipe($recipe);
                $entityManager->persist($ingredient);
            }

            $recipe->setOwner($this->getUser());
            $entityManager->persist($recipe);

            // send email to users if a recipe has been created
            $email = (new Email())
                ->from($this->getParameter('mailer_from'))
                ->to('you@example.com')
                ->subject('Une nouvelle recette vient d\'être publiée.')
                ->html($this->renderView('emails/newRecipeEmail.html.twig', ['recipe' => $recipe]));

            $mailer->send($email);

            $entityManager->flush();

            $this->addFlash('success', 'Votre recette a bien été ajoutée.');

            return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('recipe/new.html.twig', [
            'recipe' => $recipe,
            'form' => $form,
            'number' => $number,
        ]);
    }

    #[Route('/{slug}', name: 'app_recipe_show', methods: ['GET', 'POST'])]
    public function show(
        Request $request,
        Recipe $recipe,
        UserRepository $userRepository,
        CommentRepository $commentRepository,
        EntityManagerInterface $entityManager,
    ): Response {


        $comments = $commentRepository->findBy(['recipe' => $recipe]);
        $totalLikers = $userRepository->countLikersByRecipe($recipe);
        $totalNote = $commentRepository->averageNote($recipe);


        $comment = new Comment();

        $commentForm = $this->createForm(CommentType::class, $comment);
        $comment->setRecipe($recipe);
        $comment->setCommentator($this->getUser());
        $commentForm->handleRequest($request);

        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('app_recipe_show', ['slug' => $recipe->getSlug()], Response::HTTP_SEE_OTHER);
        }


        return $this->render('recipe/show.html.twig', [
            'recipe' => $recipe,
            'slug' => $recipe->getSlug(),
            'totalLikers' => $totalLikers,
            'commentForm' => $commentForm,
            'comments' => $comments,
            'totalNote' => $totalNote,
        ]);
    }

    #[Route('/{slug}/edition', name: 'app_recipe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Recipe $recipe, EntityManagerInterface $entityManager): Response
    {
        // call the AccessControl service => control if there is a connection
        $userLoggedIn = $this->accessControl->checkIfUserLoggedIn();
        if ($userLoggedIn !== true) {
            $this->addFlash('danger', 'Connecter vous pour accéder à cette ressource.');
            return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }
        // call the AccessControl service => control the owner
        $userLoggedIsAuthor = $this->accessControl->checkIfLoggedUserIsAuthor($recipe);
        if ($userLoggedIsAuthor !== true) {
            $this->addFlash('danger', 'Seul l\'auteur de la recette peut la modifier.');
            return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($recipe->getSteps() as $step) {
                if (!$step->getId()) {
                    // Si l'étape n'a pas d'identifiant, elle n'est pas persistée
                    // Obtenez le dernier numéro d'étape pour la recette actuelle
                    $lastStepNumber = $entityManager->getRepository(Step::class)
                        ->findLastStepNumberForRecipe($recipe);
                    // Incrémente le dernier numéro d'étape
                    $newStepNumber = $lastStepNumber + 1;
                    // Définissez le numéro d'étape pour la nouvelle étape
                    $step->setStepNumber($newStepNumber);
                    // Persistez la nouvelle étape
                    $entityManager->persist($step);
                }
            }
            foreach ($recipe->getIngredients() as $ingredient) {
                if (!$ingredient->getId()) {
                    $entityManager->persist($ingredient);
                }
            }
            //utilisation des services afin de supprimer ingrédients et étapes
            $this->deleteButtonService->deleteIngredients($recipe);
            $this->deleteButtonService->deleteSteps($recipe);
            $this->updateNumberService->updateStepsNumber($recipe);
            $entityManager->flush();

            return $this->redirectToRoute('app_recipe_show', ['slug' => $recipe->getSlug()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('recipe/edit.html.twig', [
            'recipe' => $recipe,
            'form' => $form,
        ]);
    }

    #[Route('/{slug}/delete', name: 'app_recipe_delete', methods: ['POST'])]
    public function delete(Request $request, Recipe $recipe, EntityManagerInterface $entityManager): Response
    {
        // call the AccessControl service => control if there is a connection
        $userLoggedIn = $this->accessControl->checkIfUserLoggedIn();
        if ($userLoggedIn !== true) {
            $this->addFlash('danger', 'Connecter vous pour accéder à cette ressource.');

            return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }
        // call the AccessControl service => control the owner
        $userLoggedIsAuthor = $this->accessControl->checkIfLoggedUserIsAuthor($recipe);
        if ($userLoggedIsAuthor !== true) {
            $this->addFlash('danger', 'Seul l\'auteur de la recette peut la modifier.');

            return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }

        if ($this->isCsrfTokenValid('delete' . $recipe->getId(), $request->request->get('_token'))) {
            $entityManager->remove($recipe);
            $entityManager->flush();
            $this->addFlash('danger', 'La recette est supprimée');
        }

        return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
    }
}
