<?php

namespace Plugin\QrcodeGenerator;

use Eccube\Event\TemplateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class Event implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'qrcode.twig' => "onQrcodeTwig",
        ];
    }

    public function onQrcodeTwig(TemplateEvent $templateEvent)
    {
        $templateEvent->setParameter("name", "hoge");
    }
}
