<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Provider;

class LocalProvider extends BaseProvider
{
    public function getTemplate()
    {
        return "StormMediaBundle:Media:local.html.twig";
    }

}
