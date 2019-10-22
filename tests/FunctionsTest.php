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

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    public function test_calculadora()
    {
        $this->assertEquals(13,suma(6,7));
        $this->assertEquals(-1,resta(6,7));
        $this->assertEquals(42,multiplicacion(6,7));
        $this->assertEquals('4 + 6 = 10',calculadora('+',4,6));
    }
}