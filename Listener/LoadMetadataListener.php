<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Listener;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Storm\MediaBundle\Media\MediaFactoryInterface;

class LoadMetadataListener
{
    /**
     * @var MediaFactoryInterface
     */
    private $media_factory;

    public function __construct(MediaFactoryInterface $media_factory)
    {
        $this->media_factory = $media_factory;
    }

    public function loadClassMetadata(LoadClassMetadataEventArgs $args)
    {
        /** @var $meta \Doctrine\ORM\Mapping\ClassMetadataInfo */
        $meta = $args->getClassMetadata();
        if ($meta->getName() == 'Storm\MediaBundle\Entity\Item') {
            $map = array();
            foreach ($this->media_factory->getMedias() as $entity => $media)
            {
                $map[$media['type']] = $entity;
            }
            $meta->setDiscriminatorMap($map);
        }
    }
}
