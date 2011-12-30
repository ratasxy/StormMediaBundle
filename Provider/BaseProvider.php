<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Provider;

use Storm\MediaBundle\Entity\MediaInterface;

abstract class BaseProvider implements ProviderInterface
{
    public function get(MediaInterface $media)
    {
        return $media->getPath();
    }
}
