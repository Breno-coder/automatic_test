<?php
namespace Alura\Leilao\service\test;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use PHPUnit\Framework\TestCase;
use Alura\Leilao\service\avaliador;

class avaliadorTest extends TestCase
{
    /** @test */
    public function test_o_maior_valor()
    {
        $leilão = new Leilao('Fiat 147 0km');
        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilão->recebelance(new Lance($maria, 2500));
        $leilão->recebelance(new Lance($joao, 2000));
        $leiloeiro = new avaliador();
        $leiloeiro->avalia($leilão);
        $maiorValor = $leiloeiro->getmaiorvalor();
        $expected = 2500;

        $this->assertEquals($expected, $maiorValor);
    }

    /** @test */
    public function test_o_menor_valor()
    {
        $leilão = new Leilao('Fiat 147 0km');
        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilão->recebelance(new Lance($maria, 2500));
        $leilão->recebelance(new Lance($joao, 2000));
        $leiloeiro = new avaliador();
        $leiloeiro->avalia($leilão);
        $maiorValor = $leiloeiro->getmenorvalor();
        $expected = 2000;

        $this->assertEquals($expected, $maiorValor);
    }
    
}

