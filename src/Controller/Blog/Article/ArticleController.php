<?php

namespace  App\Controller\Blog\Article;

use phpDocumentor\Reflection\Types\Context;
use Ste\BlogBundle\Entity\Article;
use Ste\BlogBundle\Form\Type\ArticleFormType;
use Ste\BlogBundle\Manager\ArticleManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleController
 * @package App\Controller\Blog\Article
 * @Route("/blog/article")
 */
class ArticleController extends Controller
{
    /**
     * @Route("/list", name="article_list")
     */
    public function showListAction(ArticleManager $articleManager)
    {
        //Get list articles
        $articles = $articleManager->getList();

        // Return
        return $this->render(
            'blog/article/list.html.twig',
            [
                'articles' => $articles,
            ]
        );
    }

    /**
     * @Route("/detail/{id}", name="article_detail")
     */
    public function showDetailAction(ArticleManager $articleManager, $id)
    {
        //Get list articles
        $article = $articleManager->getOneById($id);

        // Return
        return $this->render(
            'blog/article/detail.html.twig',
            [
                'article' => $article,
            ]
        );
    }

    /**
     * @Route("/create", name="article_create")
     */
    public function createAction(Request $request,ArticleManager $articleManager)
    {
        //CREATE ARTICLE
        $article = new Article();

        //CREATE FORM
        $form = $this->createForm(
          ArticleFormType::class,
          $article,
          [
              'article' => $article,
              "context" => 'creation'
          ]
        );

        //HANDLE FORM
        $form->handleRequest($request);


        //PROCESS SUBMITTED DATA
        // Check submission
        if($form->isSubmitted()) {
            if ($form->isValid()) {
                //processing
                $articleManager->create($article);

                return $this->redirectToRoute('article_list');
            }
        }

        //DISPLAY
        return $this->render(
            'blog/article/create.html.twig',
            [
                'mon_form' => $form->createView()
            ]
        );

    }

    /**
     * @Route("/update/{id}", name="article_update")
     */
    public function updateAction(ArticleManager $articleManager, Request $request, $id)
    {
        //Get list articles
        $article = $articleManager->getOneById($id);

        //CREATE FORM
        $form = $this->createForm(
            ArticleFormType::class,
            $article,
            [
                'article' => $article,
                "context" => 'update'
            ]
        );

        //HANDLE FORM
        $form->handleRequest($request);


        //PROCESS SUBMITTED DATA
        // Check submission
        if($form->isSubmitted()) {
            if ($form->isValid()) {
                //processing
                $articleManager->create($article);

                return $this->redirectToRoute('article_list');
            }
        }

        //DISPLAY
        return $this->render(
            'blog/article/update.html.twig',
            [
                'mon_form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/delete/{id}", name="article_delete")
     */
    public function deleteAction(ArticleManager $articleManager, $id)
    {
        //Get list articles
        $articleManager->deleteArticleById($id);

        return $this->redirectToRoute('article_list');

    }

}