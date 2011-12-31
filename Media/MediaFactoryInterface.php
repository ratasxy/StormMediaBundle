<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Media;

interface MediaFactoryInterface
{
    function getMedias();
    function create(\Storm\MediaBundle\Entity\ItemInterface $entity);
}
