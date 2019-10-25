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

include('../public/Zona.php');
use PHPUnit\Framework\TestCase;


class ZonaTest extends TestCase
{

    public function testOverSell()
    {
        $zona = new Zona('Principal',50);
        $this->expectException(\Exception::class);
        $zona->sellTickets(100);
    }

    public function testSell()
    {
        $zona = new Zona('Principal',50);
        $zona->sellTickets(10);
        $this->assertEquals(40,$zona->getTickets());
    }
}
