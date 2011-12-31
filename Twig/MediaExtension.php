<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Storm\MediaBundle\Entity\ItemInterface;
use Storm\MediaBundle\Entity\GalleryInterface;

class MediaExtension extends \Twig_Extension
{
    protected $container;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        return array(
            'media' => new \Twig_Function_Method($this, 'renderMedia', array('is_safe' => array('html'))),
            'gallery' => new \Twig_Function_Method($this, 'renderGallery', array('is_safe' => array('html'))),
        );
    }

    public function renderMedia(ItemInterface $media)
    {
        return $this->container->get('storm.media.templating.helper')->media($media);
    }

    public function renderGallery(GalleryInterface $gallery, $theme = 'div', $template = null)
    {
        return $this->container->get('storm.media.templating.helper')->gallery($gallery, $theme, $template ? : "StormMediaBundle:Gallery:" . $theme . ".html.twig");
    }

    function getName()
    {
        return "media";
    }
}
