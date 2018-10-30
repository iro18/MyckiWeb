<?php

namespace MyckiBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="MyckiBundle\Repository\PostRepository")
 * @Vich\Uploadable
 */
class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    
    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_publish", type="datetime")
     */
    private $datePublish;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

     /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

     /**
     * @ORM\ManyToOne(targetEntity="MyckiBundle\Entity\User")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="titleSeo", type="string", length=255)
     */
    private $titleSeo;

    /**
     * Get id
     *
     * @return int
     */
    
        public function __construct()
    {
        // Par défaut, la date de l'annonce est la date d'aujourd'hui
        $this->datePublish = new \Datetime();
        $this->published = true;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Post
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return bool
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set datePublish
     *
     * @param \DateTime $datePublish
     *
     * @return Post
     */
    public function setDatePublish($datePublish)
    {
        $this->datePublish = $datePublish;

        return $this;
    }

    /**
     * Get datePublish
     *
     * @return \DateTime
     */
    public function getDatePublish()
    {
        return $this->datePublish;
    }

    /**
     * Set image
     *
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

     public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Get image
     *
     * @return \MyckiBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set user
     *
     * @param \MyckiBundle\Entity\User $user
     *
     * @return Post
     */
    public function setUser(\MyckiBundle\Entity\User $user )
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \MyckiBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set titleSeo
     *
     * @param string $titleSeo
     *
     * @return Post
     */
    public function setTitleSeo($titleSeo)
    {
        $this->titleSeo = $titleSeo;

        return $this;
    }

    /**
     * Get titleSeo
     *
     * @return string
     */
    public function getTitleSeo()
    {
        return $this->titleSeo;
    }
}
