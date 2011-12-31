<?php

namespace Storm\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Storm\MediaBundle\Entity\Item;

/**
 * Storm\MediaBundle\Entity\Gallery
 *
 * @ORM\Entity()
 * @ORM\Table("storm_media__gallery")
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
     * @var ArrayCollection $items
     *
     * @ORM\OneToMany(targetEntity="Item", mappedBy="gallery")
     */
    private $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
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
     * Get items
     *
     * @param ArrayCollection $items
     */
    public function setItems($items)
    {
        /* @var $item Item */
        foreach ($items as $item)
        {
            $item->setGallery($this);
        }
        $this->items = $items;
    }

    /**
     * Set items
     *
     * @return ArrayCollection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Add item
     *
     * @param ItemInterface $item
     */
    public function addItem(ItemInterface $item)
    {
        $this->items->add($item);
        $item->setGallery($this);
    }

}