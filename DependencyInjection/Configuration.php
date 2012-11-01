<?php

/*
 * This file is part of the Tapronto Braspag module.
 *
 * (c) 2012 Tapronto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tapronto\BraspagBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tapronto_braspag');

        $rootNode->children()
            ->scalarNode('merchant_id')
                ->cannotBeEmpty()
            ->end()
            ->scalarNode('environment')
                ->cannotBeEmpty()
                ->validate()
                    ->ifNotInArray(array('prod', 'homolog'))
                    ->thenInvalid('Invalid payment environment: "%s"')
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
