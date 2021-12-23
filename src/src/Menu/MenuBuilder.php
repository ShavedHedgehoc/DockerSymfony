<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ChildDefinition;

// use Symfony\Component\DependencyInjection\ContainerAwareInterface;
// use Symfony\Component\DependencyInjection\ContainerAwareTrait;

// final class Builder implements ContainerAwareInterface
// {
//     use ContainerAwareTrait;

//     public function mainMenu(FactoryInterface $factory, array $options): ItemInterface
//     {
//         $menu= $factory->createItem('root');
//         $menu->addChild('Home1',['route'=>'index1']);
//         $menu->addChild('Home2',['route'=>'index2']);
//         $menu->addChild('Home3',['route'=>'index']);
//         $menu->addChild('Home4',['route'=>'index4']);
//         return $menu;
//     }
// }

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
                'class' => 'topmenu'
            ),
        ));

        $menu->addChild('Home', ['route' => 'main']);
        $menu['Home']->setAttribute('class', 'topmenulink');
        $menu->addChild('Batch', ['route' => 'batch']);
        $menu['Batch']->setAttribute('class', 'topmenulink');
        $menu->addChild('Lot', ['route' => 'lot']);
        $menu['Lot']->setAttribute('class', 'topmenulink');
        $menu->addChild('Product', ['route' => 'product']);
        $menu['Product']->setAttribute('class', 'topmenulink');
        $menu->addChild('Check', ['route' => 'check']);
        $menu['Check']->setAttribute('class', 'topmenulink');

        return $menu;
    }
}