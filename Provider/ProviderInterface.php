<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Provider;

use Storm\MediaBundle\Entity\MediaInterface;

interface ProviderInterface
{
    public function get(MediaInterface $media);

    public function getTemplate();
}
