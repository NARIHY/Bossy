<?php

namespace App\Perso\Inter;


interface EcolageCountInterface 
{
    /**
     * Methode qui permet de voir les ecolage par mois pendant une année scolaire
     *
     * @param string $totaleEcolage
     * @return float
     */
    public function month(string $totaleEcolage);
}


?>