<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Templating;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;
use Storm\MediaBundle\Media\MediaFactoryInterface;

use Storm\MediaBundle\Entity\ItemInterface;
use Storm\MediaBundle\Entity\GalleryInterface;

class MediaHelper extends Helper
{
    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var MediaFactoryInterface
     */
    private $media_factory;

    public function __construct(EngineInterface $templating, MediaFactoryInterface $media_factory)
    {
        $this->templating = $templating;
        $this->media_factory = $media_factory;
    }

    public function media(ItemInterface $item)
    {
        /** @var $media \Storm\MediaBundle\Media\Media */
        $media = $this->media_factory->create($item);
        return $this->templating->render($media->getTemplate(), array(
            'media' => $media->getEntity(),
            'options' => $media->getOptions(),
            'type' => $media->getType(),
        ));
    }

    public function gallery(GalleryInterface $gallery, $theme = 'div', $template = null)
    {
        return $this->templating->render($template ? : "StormMediaBundle:Gallery:".$theme.".html.php"
            ,array(
            'gallery' => $gallery
        ));
    }


    public function getName()
    {
        return "media";
    }
}
