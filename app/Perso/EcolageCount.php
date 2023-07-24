<?php

namespace App\Perso;



use App\Models\Ecolage;
use App\Models\TotaleEcolage;
use App\Perso\Inter\EcolageCountInterface;
class EcolageCount implements EcolageCountInterface
{

    public function month(string $totaleEcolage)
    {
        $ecolageMois = $totaleEcolage / 10;
        return $ecolageMois;
    }

    public function reste( string $matricule, string $classe)
    {
        $date = date('Y');
        $anne_detude = $date.'-'.$date+1; 
        //ecolage totale
        $ecolage = TotaleEcolage::where('anne_detude', $anne_detude)
                                    ->where('classe', $classe)
                                    ->value('prix');
        $ecoTotale = $this->month($ecolage);
        //nombre d'ecolage payer par user
        $etudiant = Ecolage::where('matricule', $matricule)
                                ->where('anne_detude', $anne_detude)
                                ->where('prix', $ecoTotale)
                                ->count();     
        //calcule de nombre d'ecolage payer par user
        
        $totale = $ecoTotale * $etudiant;

        $resultat = $ecolage - $totale;
        return $resultat;    
    }

}