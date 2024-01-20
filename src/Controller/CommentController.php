<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Recipe;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/comment')]
class CommentController extends AbstractController
{
//     #[Route('/', name: 'app_comment_index', methods: ['GET'])]
//     public function index(CommentRepository $commentRepository): Response
//     {
//         return $this->render('comment/index.html.twig', [
//             'comments' => $commentRepository->findAll(),
//         ]);
//     }

    #[Route('/new', name: 'app_comment_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, Recipe $recipe): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                    $comment->setRecipe($recipe);
                    $comment->setCommentator($this->getUser());

            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('app_recipe_show', ['id' => $recipe->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comment/new.html.twig', [
            'comment' => $comment,
            'form' => $form,
        ]);
    }

//     #[Route('/{id}', name: 'app_comment_show', methods: ['GET'])]
//     public function show(Comment $comment): Response
//     {
//         return $this->render('comment/show.html.twig', [
//             'comment' => $comment,
//         ]);
//     }

//     #[Route('/{id}/edit', name: 'app_comment_edit', methods: ['GET', 'POST'])]
//     public function edit(Request $request, Comment $comment, Recipe $recipe,
//      EntityManagerInterface $entityManager): Response
//     {
//         if ($this->getUser() !== $comment->getCommentator() && !$this->isGranted('ROLE_ADMIN')) {
//             // If not the owner, throws a 403 Access Denied exception
//             throw $this->createAccessDeniedException('Seul l\'auteur du commentaire peut le modifier!');
//         }

//         $form = $this->createForm(CommentType::class, $comment);
//         $form->handleRequest($request);

//         if ($form->isSubmitted() && $form->isValid()) {
//             $entityManager->flush();

//             return $this->redirectToRoute('app_recipe_show', ['id' => $recipe->getId()], Response::HTTP_SEE_OTHER);
//         }

//         return $this->render('comment/edit.html.twig', [
//             'comment' => $comment,
//             'form' => $form,
//         ]);
//     }

//     #[Route('/{id}', name: 'app_comment_delete', methods: ['POST'])]
//     public function delete(Request $request, Comment $comment, EntityManagerInterface $entityManager): Response
//     {
//         if ($this->getUser() !== $comment->getCommentator() && !$this->isGranted('ROLE_ADMIN')) {
//             // If not the owner, throws a 403 Access Denied exception
//             throw $this->createAccessDeniedException('Seul l\'auteur du commentaire peur le supprimer!');
//         }

//         if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
//             $entityManager->remove($comment);
//             $entityManager->flush();
//         }

//         return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
//     }
}
