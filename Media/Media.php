<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Media;

use Storm\MediaBundle\Entity\ItemInterface;

class Media
{
    private $name;

    private $entity;

    private $template;

    private $options;

    public function __construct($name, ItemInterface $entity, $template, array $options = array())
    {
        $this->name = $name;
        $this->entity = $entity;
        $this->template = $template;
        $this->options = $options;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function getTemplate()
    {
        return $this->template;
    }


}
