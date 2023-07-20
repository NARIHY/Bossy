<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtudiantRequest;
use App\Models\Classe;
use App\Models\Etudiant;
use App\Models\Promotion;
use Illuminate\Http\Request;

use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EtudiantController extends Controller
{
    /**
     * Vue qui permet de retourner la liste des étudiants
     *
     * @return View
     */
    public function index(Etudiant $etudiant)
    {
        $etudiant = Etudiant::orderBy('created_at', 'desc')->paginate(25);
        return view('admin.visuel.etudiant.index', [
            'etudiant' => $etudiant
        ]);
    }

    /**
     * cette methode permet de rendre la vue de creation d'un nouveau etudiants
     *
     * @param Promotion $promotion
     * @param Classe $classe
     * @return View
     */
    public function create(Promotion $promotion, Classe $classe)
    {
        $promotion = Promotion::pluck('title', 'id');
        $classe = Classe::pluck('title', 'id');
        return view('admin.visuel.etudiant.action.create', [
            'promotion' => $promotion,
            'classe' => $classe
        ]);
    }


    /**
     * Methode qui permet de sauvgarder l'etudiant dans la base de donné
     *
     * @param Etudiant $etudiant
     * @param EtudiantRequest $request
     * @return RedirectResponse
     */
    public function store(Etudiant $etudiant, EtudiantRequest $request)
    {
        $etudiant = Etudiant::create($request->validated());
        $etudiant->promotion()->sync(['etudiant_id' => $etudiant->id], $request->validated('promotion'));
        $etudiant->classe()->sync(['etudiant_id' => $etudiant->id], $request->validated('classe'));
        $picture = $request->validated('picture');
        if ($picture !== null && !$picture->getError()) {
            $data['picture'] = $picture->store('home', 'public');
        }
        if(!empty($picture)){
            $etudiant->update($data);
        }
        return redirect()->route('Admin.etudiant')->with('success','Création de l\'étudiant réussi');
    }

    /**
     * Permet de voir un étudiants
     *
     * @return View
     */
    public function show(Etudiant $etudiant, string $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('admin.visuel.etudiant.show', [
            'etudiant' => $etudiant
        ]);
    }
}
