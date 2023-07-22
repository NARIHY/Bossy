<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtudiantRequest;
use App\Http\Requests\EtudiantUpdateRequest;
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

    /**
     * Methode permetant d'y diriger vers la vue d'edition vers un eleve
     *
     * @param string $id
     * @param Etudiant $etudiant
     * @return View
     */
    public function edit(string $id, Etudiant $etudiant)
    {
        $etudiant = Etudiant::findOrFail($id);
        $promotion = Promotion::pluck('title', 'id');
        $classe = Classe::pluck('title', 'id');
        return view('admin.visuel.etudiant.action.edit', [
            'etudiant' => $etudiant,
            'promotion' => $promotion,
            'classe' => $classe
        ]);
    }

    /**
     * Permet de sauvgarder la mis à jour de l'étudiant
     *
     * @param string $id
     * @param Etudiant $etudiant
     * @param EtudiantUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(string $id, Etudiant $etudiant, EtudiantUpdateRequest $request)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->promotion()->sync(['etudiant_id' => $etudiant->id], $request->validated('promotion'));
        $etudiant->classe()->sync(['etudiant_id' => $etudiant->id], $request->validated('classe'));
        
        $etudiant->update($request->validated());
        
        $picture = $request->validated('picture');
        if (empty($picture)){
            $picture = $etudiant->picture;
        } else {
            //image 1
            $data['picture'] = $picture->store('blog', 'public'); 
            $etudiant->update($data);
        }
        return redirect()->route('Admin.etudiant.edit', ['id' => $etudiant->id])->with('success', 'Modification réussi');

    }

    /**
     * Permet de suprimer un etudiant
     *
     * @param string $id
     * @param Etudiant $etudiant
     * @return RedirectResponse
     */
    public function delete(string $id, Etudiant $etudiant)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();
        return redirect()->route('Admin.etudiant')->with('success', 'Suppéssion réussi');
    }

    public function cette(Etudiant $etudiant)
    {
        $date = date('Y');
        $etudiant = Etudiant::orderBy('created_at', 'desc')->where('anne_detude', $date)->paginate(25);
        return view('admin.visuel.etudiant.now', [
            'etudiant' => $etudiant
        ]);
    }
}
