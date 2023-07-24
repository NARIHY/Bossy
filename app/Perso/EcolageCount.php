<?php

namespace App\Perso;
use App\Perso\Inter\EcolageCountInterface;
class EcolageCount implements EcolageCountInterface
{

    public function month(string $totaleEcolage)
    {
        $ecolageMois = $totaleEcolage / 10;
        return $ecolageMois;
    }

}