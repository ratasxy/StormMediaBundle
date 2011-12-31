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
    private $type;

    private $entity;

    private $template;

    private $options;

    public function __construct($type, ItemInterface $entity, $template, array $options = array())
    {
        $this->type = $type;
        $this->entity = $entity;
        $this->template = $template;
        $this->options = $options;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function getType()
    {
        return $this->type;
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
