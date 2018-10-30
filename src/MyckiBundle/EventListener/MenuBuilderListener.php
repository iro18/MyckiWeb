<?php

namespace MyckiBundle\EventListener;

use Sonata\AdminBundle\Event\ConfigureMenuEvent;

class MenuBuilderListener
{
    public function addMenuItems(ConfigureMenuEvent $event)
    {
        $menu = $event->getMenu();

        $child = $menu->addChild('reports', array(
            'route' => 'admin_mycki_page_list',
            'labelAttributes' => array('icon' => 'fa fa-bar-chart'),
        ));

        $child->setLabel('Pages');
    }
}