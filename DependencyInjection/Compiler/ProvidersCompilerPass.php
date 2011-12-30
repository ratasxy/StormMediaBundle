<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ProvidersCompilerPass implements CompilerPassInterface
{
    function process(ContainerBuilder $container)
    {
        $tags = $container->findTaggedServiceIds('storm.media.provider');

        if (count($tags) > 0 && $container->hasDefinition('storm.media.media_manager')) {
            $manager = $container->getDefinition('storm.media.media_manager');

            foreach ($tags as $id => $tag) {
                $manager->addMethodCall('addProvider', array(
                    "storm.media.provider." . $tag[0]['id'],
                    new Reference($id),
                ));
            }
        }
    }
}
