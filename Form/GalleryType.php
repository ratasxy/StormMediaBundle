<?php

namespace Storm\MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class GalleryType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('items', 'collection', array(
            'type'          => new ImageType(),
            'allow_add'     => true,
            'allow_delete'  => true,
            'prototype'     => true,
            'by_reference'  => false,
            'options'       => array(
                'required'  => false,
            )
        ));
    }

    public function getName()
    {
        return 'storm.mediabundle_gallerytype';
    }
}
