<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
// use Symfony\Component\DependencyInjection\ChildDefinition;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root', array(
            'childrenAttributes' => array(
                'class' => 'navbar-nav'
            ),
        ));

        $menu->addChild('На главную', ['route' => 'main']);
        $menu['На главную']->setAttribute('class', 'nav-item');
        $menu->addChild('Варки', ['route' => 'batch']);
        $menu['Варки']->setAttribute('class', 'nav-item');
        $menu->addChild('Квазипартии', ['route' => 'lot']);
        $menu['Квазипартии']->setAttribute('class', 'nav-item');
        $menu->addChild('Сырье', ['route' => 'product']);
        $menu['Сырье']->setAttribute('class', 'nav-item');
        $menu->addChild('Отчеты');
        $menu['Отчеты']->setAttribute('class', 'nav-item');
        $menu['Отчеты']->setAttribute('dropdown', true);
        $menu['Отчеты']->addChild('Report1', ['route' => 'check']);
        $menu['Отчеты']['Report1']->setAttribute('class', 'dropdown-item');        
        $menu['Отчеты']->addChild('Report2', ['route' => 'check']);
        $menu['Отчеты']['Report2']->setAttribute('class', 'dropdown-item');
        $menu['Отчеты']->addChild('Report3', ['route' => 'check']);
        $menu['Отчеты']['Report3']->setAttribute('class', 'dropdown-item');

        
        // $menu['Отчеты']->addChild('Report2', ['route' => 'check']);
        // $menu['Отчеты']['Report2']->setAttribute('class', 'dropdown dropdownlink');
        // $menu['Отчеты']->addChild('Report3', ['route' => 'check']);
        // $menu['Отчеты']['Report3']->setAttribute('class', 'dropdown dropdownlink');
        // $dropdown['Report1']->setAttribute('class', 'topmenulink');
        
        // last remove
        // foreach ($menu as $child) {
        //     $child->setLinkAttribute('class', 'nav-link')
        //         ->setAttribute('class', 'nav-item');
        // }



        return $menu;
    }
}
