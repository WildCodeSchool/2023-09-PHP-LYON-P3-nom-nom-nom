<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(RecipeCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Nom Nom Nom Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Recipe', 'fas fa-utensils', Recipe::class);
        yield MenuItem::linkToCrud('Categorie', 'fas fa-mug-saucer', Category::class);
        yield MenuItem::linkToCrud('Ingredient', 'fas fa-book', Ingredient::class);
        yield MenuItem::linkToCrud('Commentaire', 'fas fa-comment', Comment::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-users', User::class);
        yield MenuItem::linkToRoute('Retour sur le site', 'fa fa-circle-left', 'app_home');
    }
}
