<?php

namespace Ste\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Article
 * @package Ste\BlogBundle\Entity
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="Ste\BlogBundle\Repository\ArticleRepository")
 */

class Article
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Article
     */
    public function setId(int $id): Article
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle(string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Article
     */
    public function setAuthor(string $author): Article
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return Article
     */
    public function setDate(\DateTime $date): Article
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Article
     */
    public function setDescription(string $description): Article
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Article
     */
    public function setText(string $text): Article
    {
        $this->text = $text;
        return $this;
    }
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     *
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=200)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(name="author", type="string", length=200)
     */
    private $author;

    /**
     * @var \DateTime
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=250)
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(name="text", type="text")
     */
    private $text;
}