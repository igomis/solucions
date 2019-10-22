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

use Ejercicios\Form;
use Ejercicios\SIInput;
use PHPUnit\Framework\TestCase;


class FormTest extends TestCase
{

    public function test__construct()
    {
        $form = new Form([new SIInput('Usuari','usuario'),new SIInput('Password','password','password')]);
        $this->assertIsArray($form->getComponents());
        $this->assertCount(2,$form->getComponents());
    }

    public function testRender()
    {
        $form = new Form([new SIInput('Usuari','usuario'),new SIInput('Password','password','password')]);
        $this->assertStringContainsString('password',$form->render());
    }
}
