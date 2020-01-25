<?php
namespace Alura\Leilao\service\test;

use Alura\Leilao\Model\{Lance, Leilao, Usuario};
use PHPUnit\Framework\TestCase;
use Alura\Leilao\service\avaliador;

class avaliadorTest extends TestCase
{
    /** @test */
    public function test_o_maior_valor()
    {
        $leilao = $this->criadordeleiloesemordemcrescente();
        $leiloeiro = new avaliador();
        $leiloeiro->avalia($leilao);
        $maiorValor = $leiloeiro->getmaiorvalor();
        $expected = 2500;

        $this->assertEquals($expected, $maiorValor);
    }

    /** @test */
    public function test_o_menor_valor()
    {
        $leilao = $this->criadordeleiloesemordemdecrescente();
        $leiloeiro = new avaliador();
        $leiloeiro->avalia($leilao);
        $menorvalor = $leiloeiro->getmenorvalor();
        $expected = 2000;

        $this->assertEquals($expected, $menorvalor);
    }

    /** @test */
    public function test_maioreslances()
    {
        $leilao = $this->criadordeleiloesemordemaleatoria();
        $leiloeiro = new avaliador();
        $leiloeiro->avalia($leilao);

        $maiores = $leiloeiro->getmaioreslances();
        static::assertCount(3,$maiores);
        static::assertEquals(2000, $maiores[0]->getValor());
        static::assertEquals(1700, $maiores[1]->getValor());
        static::assertEquals(1500, $maiores[2]->getValor());
    }
    
    public function criadordeleiloesemordemcrescente()
    {
        $leilao = new Leilao('Fiat 147 0km');
        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('ana');

        $leilao->recebelance(new Lance($maria, 2500));
        $leilao->recebelance(new Lance($joao, 2000));
        $leilao->recebelance(new Lance($ana, 1700));

        return $leilao;
    }

    public function criadordeleiloesemordemdecrescente()
    {
        $leilao = new Leilao('Fiat 147 0km');
        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebelance(new Lance($maria, 2500));
        $leilao->recebelance(new Lance($joao, 2000));
        return $leilao;
    }

    public function criadordeleiloesemordemaleatoria()
    {
        $leilao = new Leilao('Fiat 147 0KM');
        $joao = new Usuario('joao');
        $maria = new Usuario('maria');
        $ana = new Usuario('ana');
        $jorge = new Usuario('jorge');

        $leilao->recebeLance(new Lance($ana, 1500));
        $leilao->recebeLance(new Lance($joao, 1000));
        $leilao->recebeLance(new Lance($maria, 2000));
        $leilao->recebeLance(new Lance($jorge, 1700));
        return $leilao;
    }
}

