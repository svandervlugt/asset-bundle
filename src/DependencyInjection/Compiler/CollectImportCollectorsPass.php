<?php

namespace Hostnet\Bundle\AssetBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class CollectImportCollectorsPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('hostnet_asset.import_collector');

        foreach ($container->findTaggedServiceIds('asset.import_collector') as $id => $tags) {
            $definition->addMethodCall('addCollector', [new Reference($id)]);
        }
    }
}
