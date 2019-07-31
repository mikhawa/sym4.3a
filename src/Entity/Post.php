<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Post {

    const NUMBER_OF_ITEMS = 10;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string")
     */
    private $authorEmail;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publishedAt;


    public function __construct() {
        $this->publishedAt = new \DateTime();

    }
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getContent() {
        return $this->content;
    }

    public function getAuthorEmail() {
        return $this->authorEmail;
    }

    public function getPublishedAt() {
        return $this->publishedAt;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function setAuthorEmail($authorEmail) {
        $this->authorEmail = $authorEmail;
        return $this;
    }

    public function setPublishedAt($publishedAt) {
        $this->publishedAt = $publishedAt;
        return $this;
    }



}
