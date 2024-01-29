<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserEditType;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/my-profil')]
class SecurityController extends AbstractController
{
    #[Route('/', name: 'app_profile')]
    public function profile(): Response
    {
        $user = $this->getUser();
        return $this->render('security/profile.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/edit', name: 'app_profile_edit', methods: ['GET', 'POST'])]
    public function editProfile(
        Request $request,
        EntityManagerInterface $entityManager,
    ): Response {
        $user = $this->getUser();

        $form = $this->createForm(UserEditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_profile', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('security/profile_edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/delete', name: 'app_profile_delete')]
    public function deleteProfile(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {

        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
            $this->addFlash('danger', 'Votre compte a été supprimé');
        }

        return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/favorite', name: 'app_profile_favorite_recipes')]
    public function favoriteRecipes(RecipeRepository $recipeRepository): Response
    {
        $user = $this->getUser();
        $totalFavoriteRecipes = $recipeRepository->countFavoriteRecipes($user);
        return $this->render('security/profile_favorite.html.twig', [
            'user' => $user,
            'totalFavoriteRecipes' => $totalFavoriteRecipes
        ]);
    }

    #[Route('my-profil/my-recipes', name: 'app_profile_my_recipes')]
    public function myRecipes(RecipeRepository $recipeRepository): Response
    {
        $user = $this->getUser();
        $totalMyRecipes = $recipeRepository->countMyRecipes($user);
        return $this->render('security/profile_my_recipes.html.twig', [
            'user' => $user,
            'totalMyRecipes' => $totalMyRecipes
        ]);
    }
}
