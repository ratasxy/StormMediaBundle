<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Templating;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;
use Storm\MediaBundle\Media\GalleryManagerInterface;
use Storm\MediaBundle\Media\MediaManagerInterface;

use Storm\MediaBundle\Entity\MediaInterface;
use Storm\MediaBundle\Entity\GalleryInterface;

class MediaHelper extends Helper
{
    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var GalleryManagerInterface
     */
    private $gallery_manager;

    /**
     * @var MediaManagerInterface
     */
    private $media_manager;

    public function __construct(EngineInterface $templating, GalleryManagerInterface $gallery_manager, MediaManagerInterface $media_manager)
    {
        $this->templating = $templating;
        $this->gallery_manager = $gallery_manager;
        $this->media_manager = $media_manager;
    }

    public function media(MediaInterface $media)
    {
        $provider = $this->media_manager->getProvider($media);
        return $this->templating->render($provider->getTemplate(), array(
            'media' => $media,
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
