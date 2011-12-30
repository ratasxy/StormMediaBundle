<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\Provider;

class RemoteProvider extends BaseProvider
{
    public function getTemplate()
    {
        return "StormMediaBundle:Media:remote.html.twig";
    }
}
