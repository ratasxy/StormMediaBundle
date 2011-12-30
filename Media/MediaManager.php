<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Media;

use Storm\MediaBundle\Entity\MediaInterface;
use Storm\MediaBundle\Provider\ProviderInterface;

class MediaManager implements MediaManagerInterface
{
    /**
     * @var array
     */
    private $medias;

    /**
     * @var array
     */
    private $providers;

    /**
     * @param $medias
     */
    public function __construct($medias)
    {
        $this->medias = $medias;
        $this->providers = array();
    }

    /**
     * @param string $name
     * @param \Storm\MediaBundle\Provider\ProviderInterface $provider
     */
    public function addProvider($name, ProviderInterface $provider)
    {
        $this->providers[$name] = $provider;
    }

    /**
     * @param array $medias
     */
    public function setMedias(array $medias)
    {
        $this->medias = $medias;
    }

    /**
     * @return array
     */
    public function getMedias()
    {
        return $this->medias;
    }

    public function getProvider(MediaInterface $media)
    {
        return $this->providers[$media->getProvider()];
    }
}
