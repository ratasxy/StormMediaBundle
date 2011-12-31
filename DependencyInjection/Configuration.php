<?php

/**
 * Stormlabs
 *
 * (c) Ernesto Jose Vargas Paz <ejosvp@gmail.com>
 */

namespace Storm\MediaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('storm_media');

        $rootNode
            ->children()
                ->arrayNode('medias')
                    ->useAttributeAsKey('id')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('id')->end()
                            ->scalarNode('entity')->end()
                            ->scalarNode('template')->defaultValue('StormMediaBundle:Media:item.html.twig')->end()
                            ->arrayNode('options')
                                ->useAttributeAsKey('key')
                                ->prototype('variable')
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
