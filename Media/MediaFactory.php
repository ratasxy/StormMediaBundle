<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Media;

use Storm\MediaBundle\Entity\ItemInterface;

use Storm\MediaBundle\Media\Media;

class MediaFactory implements MediaFactoryInterface
{
    private $medias;

    public function __construct($medias)
    {
        foreach ($medias as $key => $media)
        {
            $media['type'] = $key;
            $this->medias[$media['entity']] = $media;
        }
    }

    public function setMedias(array $medias)
    {
        $this->medias = $medias;
    }

    public function getMedias()
    {
        return $this->medias;
    }

    public function getMedia($name)
    {
        return $this->medias[$name];
    }

    public function create(ItemInterface $entity)
    {
        $info = $this->getMedia(get_class($entity));

        $media = new Media($info['type'], $entity, $info['template'], $info['options']);

        return $media;
    }
}
