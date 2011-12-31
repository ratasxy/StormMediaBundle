<?php
/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Entity;

interface ItemInterface
{
    function getId();

    function setTitle($title);

    function getTitle();

    function setPath($path);

    function getPath();

    function setGallery(GalleryInterface $gallery);

    function getGallery();
}
