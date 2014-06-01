<?php
namespace Tarioch\PhealBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 *  This is the class that loads and manages your bundle configuration
 *
 *  To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class TariochPhealExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $container->setParameter('tarioch.phealbundle.user_agent', $config['user_agent']);
    }
}
