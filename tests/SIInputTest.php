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

use Ejercicios\SIInput;
use PHPUnit\Framework\TestCase;



class SIInputTest extends TestCase
{
    public function test_works_textArea()
    {
        $input = new SIInput('Usuari','usuario','textarea');
        $this->assertStringContainsString('textarea',$input->render());
    }
    public function test_works_textInput()
    {
        $input = new SIInput('Usuari','usuario');
        $this->assertStringContainsString('text',$input->render());
    }

    public function test_works_textPass()
    {
        $input = new SIInput('Usuari','usuario','password');
        $this->assertStringContainsString('password',$input->render());
    }
}
