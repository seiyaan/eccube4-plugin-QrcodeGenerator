<?php
namespace Plugin\QrcodeGenerator;

use Eccube\Plugin\AbstractPluginManager;
use Plugin\QrcodeGenerator\Entity\Config;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PluginManager extends AbstractPluginManager
{
    /**
     * プラグイン有効化時に走る
     * @param array $meta
     * @param ContainerInterface $container
     */
    public function enable(array $meta, ContainerInterface $container)
    {
        $this->createConfig($container);
    }

    /**
     * 設定情報を入れる
     * @param ContainerInterface $container
     */
    private function createConfig(ContainerInterface $container)
    {
        $em = $container->get('doctrine.orm.entity_manager');
        $Config = $em->find(Config::class, 1);
        if($Config) return;

        $Config = new Config();
        $Config->setSize(50);
        $em->persist($Config);
        $em->flush($Config);
    }
}