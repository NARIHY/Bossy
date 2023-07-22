<?php

namespace App\Http\Controllers;

use App\Http\Requests\TotaleEcolageRequest;
use App\Models\Classe;
use App\Models\TotaleEcolage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TotaleEcolageController extends Controller
{
    
    /**
     * Methode qui permet de renvoyer vers totlae Ecolage
     *
     * @return View
     */
    public function index()
    {
        $date = date('Y');
        $tdate = $date.'-'.$date+1;
        $totale = TotaleEcolage::orderBy('prix' , 'asc')->where('anne_detude', $tdate)->paginate(15);
        return view('admin.scolarite.totaleEcolage.index', [
            'totale' => $totale
        ]);
    }

    /**
     * methode qui permet d'ajouter de l'ecolage
     *
     * @return View
     */
    public function ajouter()
    {
        $classe = Classe::pluck('title', 'id');
        return view('admin.scolarite.totaleEcolage.action.ajouter', [
            'classe' => $classe
        ]);
    }
    
    /**
     * Methode qui permet de sauvgarder un ecolage ajouter
     *
     * @param TotaleEcolage $totale
     * @param TotaleEcolageRequest $request
     * @return RedirectResponse
     */
    public function store(TotaleEcolage $totale, TotaleEcolageRequest $request)
    {
        $totale = TotaleEcolage::create($request->validated());
        $totale->classe()->sync(['totale_ecolage_id' => $totale->id], $request->validated('classe'));
        
        return redirect()->route('Admin.ecolage.totale')->with('success', 'Ajout de l\'écolage reussi');
    }

    /**
     * methode qui permet de suprimer un ecolage
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function delete(string $id)
    {
        $totale = TotaleEcolage::findOrFail($id);
        $totale->delete();
        return redirect()->route('Admin.ecolage.totale')->with('success', 'Supréssion reussi');
    }
}
