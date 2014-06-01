<?php
namespace Tarioch\PhealBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('tarioch_pheal');
        $rootNode->children()
            ->scalarNode('user_agent')
            ->isRequired()
            ->cannotBeEmpty()
            ->info('User Agent to send to CCP so they have a contact in case of issues')
            ->example('myname@email.tld')
            ->end()
            ->end();

        return $treeBuilder;
    }
}
