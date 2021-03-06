<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

interface GalleryInterface
{
    function getId();

    function setTitle($title);

    function getTitle();

    function setMeta(array $meta);

    function getMeta();

    function setItems($items);

    function getItems();

    function addItem(ItemInterface $item);
}
