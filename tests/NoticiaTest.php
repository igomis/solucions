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

use Ejercicios\Noticia;
use PHPUnit\Framework\TestCase;


class NoticiaTest extends TestCase
{

    public function test__construct()
    {
        $noticia = new Noticia('Texto Noticia','Fulano','fenix_2.jpg',1);
        $this->assertStringContainsString('Texto Noticia',$noticia->getTexto());
        $this->assertStringContainsString('Fulano',$noticia->getRedactor());
        $this->assertStringContainsString('fenix_2.jpg',$noticia->getImg());
        $this->assertEquals(200,$noticia->getWidthImg());
        $this->assertEquals(200,$noticia->getHeightImg());
        $this->assertEquals('urgent',$noticia->getPriority());

        $noticia = new Noticia('Texto Noticia','Fulano',null,2);
        $this->assertEquals(null,$noticia->getWidthImg());
        $this->assertEquals('normal',$noticia->getPriority());

        $noticia = new Noticia('Texto Noticia','Fulano','fenix_2.jpg',3,100,100);
        $this->assertEquals(100,$noticia->getWidthImg());
        $this->assertEquals('baixa',$noticia->getPriority());

        $noticia = new Noticia('Texto Noticia','Fulano','fenix_2.jpg',4,100,100);
        $this->assertEquals(100,$noticia->getHeightImg());
        $this->assertEquals('arxiu',$noticia->getPriority());
    }

    public function testRender(){
        $noticia = new Noticia('Texto Noticia','Fulano','fenix_2.jpg',1);
        $salida = $noticia->render();
        $this->assertStringContainsString("class='noticia urgent'",$salida);
        $this->assertStringContainsString("<img src='images/fenix_2.jpg'",$salida);
        $this->assertStringContainsString("<div class='firma'>Fulano</div>",$salida);
    }


}
