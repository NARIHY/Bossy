<?php

namespace App\Perso\Inter;


interface EcolageCountInterface 
{
    /**
     * Methode qui permet de voir les ecolage par mois pendant une année scolaire
     * 
     * 1) verifie seulement les ecolage par mois exemple:
     *          - 1 mois = 10 000 Ar
     *          - 10 mois = 100 000 Ar 
     * 
     * @param string $totaleEcolage
     * @return float
     */
    public function month(string $totaleEcolage);

    /**
     * methode qui permet d'afficher le reste d'ecolage a payer pour un etudiant
     * 
     *  1) prend la somme totale de l'ecolage de l'etudiant par classe
     *  2) compte le nombre de fois ou l'etudiant a payer son ecolage
     *  
     *  3)renvoye le reste d'ecolage qu'il doit payer 
     *
     * @param string $anne_detude
     * @param string $matricule
     * @return float
     */
    public function reste(string $matricule, string $classe);
}


?>