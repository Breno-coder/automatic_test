<?php

namespace Alura\Leilao\service;

use Alura\Leilao\Model\Leilao;

class avaliador
{
    private $maiorvalor = -INF;
    private $menorvalor = INF;
    public function avalia(Leilao $leilao):void
    {
        foreach ($leilao->getLances() as $lance) 
        {
            if ($lance->getValor() > $this->maiorvalor)
            {
                $this->maiorvalor = $lance->getValor();
            }
            elseif ($lance->getValor() < $this->menorvalor)
            {
                $this->menorvalor = $lance->getValor();
            }
        }
    }

    public function getmaiorvalor() : float
    {
        return $this->maiorvalor;
    }

    public function getmenorvalor() : float
    {
        return $this->menorvalor;
    }

    public function FunctionName(Type $var = null)
    {
        # code...
    }
}
