<?php

namespace Plugin\QrcodeGenerator;

use Eccube\Event\TemplateEvent;
use Plugin\QrcodeGenerator\Repository\ConfigRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class Event implements EventSubscriberInterface
{
    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    /**
     * Constructor.
     *
     * @param ConfigRepository $configRepository
     */
    public function __construct(
        ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'index.twig' => 'onQrcodeTwig',
            'Product/list.twig' => 'onQrcodeTwig',
            'Product/detail.twig' => 'onQrcodeTwig',
        ];
    }

    public function onQrcodeTwig(TemplateEvent $templateEvent)
    {
        $Config = $this->configRepository->get();
        $size = $Config->getSize();

        $page_url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        $qrcode_url = "https://chart.apis.google.com/chart?cht=qr";
        $qrcode_url .= "&chs={$size}x{$size}";
        $qrcode_url .= "&chl={$page_url}";
        $templateEvent->setParameter('qrcode_url', $qrcode_url);
        $templateEvent->setParameter('qrcode_size', $size);
    }


}
