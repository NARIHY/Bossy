<?php

namespace App\Http\Controllers;

use App\Http\Requests\EcolageRequest;
use App\Models\Classe;
use App\Models\Ecolage;
use App\Models\TotaleEcolage;
use App\Perso\EcolageCount;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EcolageController extends Controller
{
    /**
     * methode qi permet de retourner une vue de paye d'ecolage
     *
     * @return View
     */
    public function index(): View
    {
        $classe = Classe::pluck('title', 'id');
        return view('admin.scolarite.ecolage.index', [
            'classe' => $classe
        ]);
    }

   
    
    /**
     * Methode qui permet de payer un ecolage
     *
     * @param Ecolage $ecolage
     * @param EcolageRequest $request
     * @param EcolageCount $count
     * @return RedirectResponse
     */
    public function store(Ecolage $ecolage, EcolageRequest $request, EcolageCount $count): RedirectResponse
    {
        $count = new EcolageCount();
        //recuperation de l'etuidant
        $matricule = $request->validated('matricule');
        $anne_detude = $request->validated('anne_detude');
        $classe = $request->validated('classe');
        
        $monthEco = TotaleEcolage::where('anne_detude', $anne_detude)
                                    ->where('classe', $classe)
                                    ->value('prix');                         
        if ($monthEco === null) {
            return redirect()->route('Admin.ecolage.paye')->with('error', 'Il n\'y a pas d\'écolage pour cette année');
        }                            
        $eco = $count->month($monthEco);
        $prix = $request->validated('prix');
        if ($prix != $eco) {
            return redirect()->route('Admin.ecolage.paye')->with('error', 'le montant donné ne correspond pas aux montant mensuelle');
        }
        $ecolage = Ecolage::create($request->validated());
        $ecolage->classe()->sync(['ecolage_id' => $ecolage->id], $request->validated('classe'));
        return redirect()->route('Admin.ecolage.totale')->with('success','Payement réussi');
    }
}
