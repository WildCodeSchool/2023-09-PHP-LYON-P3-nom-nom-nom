<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\RecipeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category')]
class CategoryController extends AbstractController
{
    #[Route('/{id}', name: 'app_category_show', methods: ['GET'])]
    public function show(
        Category $id,
        CategoryRepository $categoryRepository,
        RecipeRepository $recipeRepository,
        Request $request,
        PaginatorInterface $paginator
    ): Response {
        $category = $categoryRepository->findOneBy(['id' => $id]);
        $recipes = $recipeRepository->findBy(['category' => $category], ['nameRecipe' => 'ASC']);
        $totalRecipesByCat = $recipeRepository->countRecipeByCat($category);

        $paginations = $paginator->paginate(
            $recipes,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'recipes' => $recipes,
            'totalRecipesByCategory' => $totalRecipesByCat,
            'paginations' => $paginations
        ]);
    }
}
