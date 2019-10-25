<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-10-17
 * Time: 22:59
 */

require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

include('../public/Menu.php');
use PHPUnit\Framework\TestCase;


class MenuTest extends TestCase
{

    public function testCanSeeOptionMenu()
    {
        $menu = new Menu('Principal');
        $menu->setOptions(['show' => 'Opcion1','link'=>'hola.php']);
        $contenido = $menu->showHorit();
        $this->assertStringContainsString('Opcion1',$contenido);
        $this->assertStringContainsString("href='hola.php'>",$contenido);
    }

    public function testDifference()
    {
        $menu = new Menu('Principal');
        $menu->setOptions(['show' => 'Opcion1','link'=>'hola.php']);
        $this->assertStringContainsString('justify-content-center',$menu->showHorit());
        $this->assertStringContainsString('flex-column',$menu->showVert());
    }
}
