<?php

namespace Storm\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class LocalItem extends Item
{
    /**
     * @var string $filesystem
     *
     * @ORM\Column(name="filesystem", type="string", length=255)
     */
    private $filesystem;

    /**
     * @param string $filesystem
     */
    public function setFilesystem($filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @return string
     */
    public function getFilesystem()
    {
        return $this->filesystem;
    }
}