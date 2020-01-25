<?php

namespace Alura\Leilao\service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;

class avaliador
{
    private $maiorvalor = -INF;
    private $menorvalor = INF;
    private $maioreslances;
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

        $lances = $leilao->getLances();
        usort($lances, function (Lance $lance1, Lance $lance2)
        {
            return $lance2->getValor() - $lance1->getValor();
        });
        $this->maioreslances = array_slice($lances, 0, 3);
    }

    public function getmaiorvalor() : float
    {
        return $this->maiorvalor;
    }

    public function getmenorvalor() : float
    {
        return $this->menorvalor;
    }

    public function getmaioreslances() : array
    {
        return $this->maioreslances;
    }
}
