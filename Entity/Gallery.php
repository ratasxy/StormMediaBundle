<?php

namespace Storm\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Storm\MediaBundle\Entity\Media;

/**
 * Storm\MediaBundle\Entity\Gallery
 *
 * @ORM\Entity()
 * @ORM\Table("storm.media__gallery")
 */
class Gallery implements GalleryInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var array $meta
     *
     * @ORM\Column(name="meta", type="array")
     */
    private $meta;

    /**
     * @var ArrayCollection $medias
     *
     * @ORM\OneToMany(targetEntity="Media", mappedBy="gallery")
     */
    private $medias;

    public function __construct()
    {
        $this->medias = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->title;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * Set meta
     *
     * @param array $meta
     */
    public function setMeta(array $meta)
    {
        $this->meta = $meta;
    }

    /**
     * Get meta
     *
     * @return array
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * Get medias
     *
     * @param ArrayCollection $medias
     */
    public function setMedias($medias)
    {
        /* @var $media Media */
        foreach ($medias as $media)
        {
            $media->setGallery($this);
        }
        $this->medias = $medias;
    }

    /**
     * Set medias
     *
     * @return ArrayCollection
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * Add media
     *
     * @param Media $media
     */
    public function addMedia(MediaInterface $media)
    {
        $this->medias->add($media);
        $media->setGallery($this);
    }

}