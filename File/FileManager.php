<?php

namespace Storm\MediaBundle\File;

use Storm\MediaBundle\Entity\EntityWithFileInterface;

class FileManager {

    /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
    private $file;

    /** @var string $old_file */
    private $old_file;

    /** @var EntityWithFileInterface $old_file */
    private $entity;

    private $options;

    public function __construct(EntityWithFileInterface $entity, $options = array())
    {
        $this->entity = $entity;
        $this->old_file = $this->getFileAbsolutePath();
        $this->options = array_merge($this->getDefaultOptions(), $options);
    }

    public function prepare()
    {
        $this->file = $this->entity->getUploadedFile();
        if ($this->file === null) return;
        $this->entity->setPath($this->entity->getFileBaseName().'.'.$this->file->guessExtension());
    }

    public function process()
    {
        if ($this->options['delete_old'] && $this->old_file !== $this->getFileAbsolutePath()) {
            $this->removeFile($this->old_file);
        }
        if (null === $this->file) return;

//        echo "<pre>";\Doctrine\Common\Util\Debug::dump(realpath(__DIR__ . '/../../../../../web/media/uploads/g'), 5);die("</pre>");

        $this->file->move($this->entity->getUploadDir(), $this->entity->getPath());
    }

    public function delete()
    {
        $this->removeFile($this->getFileAbsolutePath());
    }

    private function removeFile($file)
    {
        if ($file !== null) {
            unlink($file);
        }
    }

    private  function getFileAbsolutePath()
    {
        return null === $this->entity->getPath() ? null : $this->entity->getUploadDir()."/".$this->entity->getPath();
    }

    private function getDefaultOptions()
    {
        $defaultOptions = array(
            'delete_old' => false,
            'use_entity_id' => false,
        );

        return $defaultOptions;
    }
}
