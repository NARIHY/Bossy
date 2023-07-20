<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeAdminRequest;
use App\Models\Acceuil;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HomeAdminControllers extends Controller
{
    /**
     * Ceci est l'affichage du vue de HomeAdministration 
     * controlle les elements dans Home et non le tableau de bord
     *
     * @return View
     */
    public function index()
    {
        $home = Acceuil::paginate(25);
        return view('admin.visuel.home.index', [
            'home' => $home
        ]);
    }

    /**
     * Permet de poster une publication
    */

    public function create()
    {
        return view('admin.visuel.home.options.create');
    }

    /**
     * Undocumented function
     *
     * @param HomeAdminRequest $request
     * @param Acceuil $acceuil
     * @return RedirectResponse
     */
    public function store(HomeAdminRequest $request, Acceuil $acceuil)
    {
        $acceuil = Acceuil::create($request->validated());
        //verification si picture n'est pas vide
        $picture = $request->validated('picture');
        if ($picture !== null && !$picture->getError()) {
            $data['picture'] = $picture->store('home', 'public');
        }
        if(!empty($picture)){
            $acceuil->update($data);
        }
        //verification si video n'est pas vide
        $video = $request->validated('video');
        if ($video !== null && !$video->getError()) {
            $data['video'] = $video->store('home.video', 'public');
        }
        if(!empty($video)){
            $acceuil->update($data);
        }

        //redirection vers index
        return redirect()->route('Admin.home.bossy')->with('success', 'Création de la pub réussi');

    }

    /**
     * Supréssion d'un pub
     *
     * @param string $id
     * @return RedirectResponse
     */
    
    public function delete(string $id)
    {
        $acceuil = Acceuil::findOrFail($id);
        $acceuil->delete();
        return redirect()->route('Admin.home.bossy')->with('success', 'supréssion de la pub reussi');
    }
    /**
     * Sert a rediriger vers la vue d'edition
     *
     * @param string $id
     * @return View
     */
    public function edit(string $id)
    {
        $acceuil = Acceuil::findOrFail($id);
        return view('admin.visuel.home.options.edit',[
            'acceuil' =>$acceuil
        ]);

    }

    /**
     * Code qui permet de mettre a jour l'edition
     *
     * @param string $id
     * @param Acceuil $acceuil
     * @param HomeAdminRequest $request
     * @return RedirectResponse
     */
    public function update(string $id, Acceuil $acceuil, HomeAdminRequest $request)
    {
        $acceuil = Acceuil::findOrFail($id);
        $acceuil->update($request->validated());

        //pour l'image si vide ou pas
        $picture = $request->validated('picture');
        if (empty($picture)){
            $picture = $acceuil->picture;
        } else {
            //image 1
            $data['picture'] = $picture->store('home', 'public');
            $acceuil->update($data);
        }

        //pour la video si vide ou pas
        $video = $request->validated('video');
        if (empty($video)){
            $video = $acceuil->picture;
        } else {
            //image 1
            $data['video'] = $video->store('home.video', 'public');
            $acceuil->update($data);
        }
        return redirect()->route('Admin.home.edit', ['id' => $acceuil->id])->with('success', 'Modification reussi');
    }
}
