<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromotionRequest;
use App\Models\Promotion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromotionController extends Controller
{
    /**
     * Methode qui retourne la vue de promotion
     *
     * @return View
     */
    public function index()
    {
        $promotion = Promotion::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.visuel.etudiant.promotion.index', [
            'promotion' => $promotion
        ]);  
    }

    /**
     * Methode qui retourne la vue de creation d'un  promotion
     *
     * @return View
     */
    public function create()
    {
        return view('admin.visuel.etudiant.promotion.action.create');
    }

    /**
     * Methode qui permet le sauvgarde d'une nouvelle promotion dans le bd
     *
     * @param Promotion $promotion
     * @param PromotionRequest $request
     * @return RedirectResponse
     */
    public function store(Promotion $promotion, PromotionRequest $request)
    {
        $promotion = Promotion::create($request->validated());
        return redirect()->route('Admin.etudiant.promotion')->with('success', 'Creation du promotion réussi');        
    }

    /**
     * redirection vers la vue d'edition d'un promotion
     *
     * @param Promotion $promotion
     * @param string $id
     * @return View
     */
    public function edit(Promotion $promotion, string $id)
    {
        $promotion = Promotion::findOrFAil($id);
        return view('admin.visuel.etudiant.promotion.action.edit', [
            'promotion' => $promotion
        ]);
    }

    /**
     * Permet l'update de promotion
     *
     * @param PromotionRequest $request
     * @param Promotion $promotion
     * @param string $id
     * @return RedirectResponse
     */
    public function update(PromotionRequest $request, Promotion $promotion, string $id)
    {
        $promotion = Promotion::findOrFAil($id);
        $promotion->update($request->validated());
        return redirect()->route('Admin.etudiant.promotion.edit', ['id' => $promotion->id])->with('success', 'Modification réussi');       
    }
}
