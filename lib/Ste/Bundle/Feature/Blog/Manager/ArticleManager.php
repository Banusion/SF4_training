<?php

namespace Ste\BlogBundle\Manager;

use Ste\BlogBundle\Entity\Article;
use Doctrine\Common\Persistence\ManagerRegistry;

class ArticleManager
{
    /**
     * @var ManagerRegistry
     */
    private $doctrine;

    /**
     * ArticleManager constructor.
     *
     * @param ManagerRegistry $doctrine
     */
    public function  __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getList()
    {
        return $this
            ->doctrine
            ->getRepository('SteBlogBundle:Article')
            ->findAll();
    }

    public function getOneById($idArticle)
    {
        return $this
            ->doctrine
            ->getRepository('SteBlogBundle:Article')
            ->find($idArticle);
    }

    public function create(Article $article)
    {
        $em = $this->doctrine->getManager();
        $em->persist($article);
        $em->flush();

    }

    public function deleteArticleById($id)
    {
        $em = $this->doctrine->getManager();
        $em->remove($this->getOneById($id));
        $em->flush();
    }

    public function update(Article $article)
    {
        $em = $this->doctrine->getManager();
        $em->persist($article);
        $em->flush();

    }
}