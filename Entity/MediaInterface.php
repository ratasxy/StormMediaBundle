<?php
/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Entity;

interface MediaInterface
{
    public function getId();

    public function setTitle($title);

    public function getTitle();

    public function setPath($path);

    public function getPath();

    public function setGallery(GalleryInterface $gallery);

    public function getGallery();

    /**
     * @abstract
     * @return string
     */
    public function getProvider();
}
