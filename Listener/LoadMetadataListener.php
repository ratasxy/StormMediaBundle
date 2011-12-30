<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Listener;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Storm\MediaBundle\Media\MediaManagerInterface;

class LoadMetadataListener
{
    /**
     * @var MediaManagerInterface
     */
    private $media_manager;

    public function __construct(MediaManagerInterface $media_manager)
    {
        $this->media_manager = $media_manager;
    }

    public function loadClassMetadata(LoadClassMetadataEventArgs $args)
    {
        /** @var $meta \Doctrine\ORM\Mapping\ClassMetadataInfo */
        $meta = $args->getClassMetadata();

        if ($meta->getName() == 'Storm\MediaBundle\Entity\Media') {
            $map = array();
            foreach ($this->media_manager->getMedias() as $id => $media)
            {
                $map[$id] = $media['entity'];
            }
            $meta->setDiscriminatorMap($map);
        }
    }
}
