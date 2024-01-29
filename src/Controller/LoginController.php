<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(
        AuthenticationUtils $authenticationUtils,
        Request $request,
    ): Response {
        $session = $request->getSession();
        $refererUrl = $request->headers->get('referer');
        $session->set('referer_url', $refererUrl);

        $user = $this->getUser();

        if ($user !== null) {
            return $this->redirectToRoute('app_profile', [], Response::HTTP_SEE_OTHER);
        } else {
            // get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();

            // last username entered by the user
            $lastUsername = $authenticationUtils->getLastUsername();

            $this->addFlash('success', 'Bienvenue sur NomNomNom');

            return $this->render('login/index.html.twig', [
                'last_username' => $lastUsername,
                'error'         => $error,
            ]);
        }
    }
}
