<?php

namespace Storm\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class RemoteMedia extends Item
{
    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @param $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}