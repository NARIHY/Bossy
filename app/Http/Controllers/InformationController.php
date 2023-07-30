<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformationRequest;
use App\Http\Requests\InformationUpdateRequest;
use App\Models\Information;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InformationController extends Controller
{
    /**
     * This methods drive us to the Information Administrator views
     *
     * @return View
     */
    public function index() : View
    {
        $information = Information::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.visuel.information.index', [
            'information' => $information
        ]);
    }


    /**
     * this methods drive us to the Creation of new information on the dashboard
     * @return View
     */
    public function create(): View 
    {
        return view('admin.visuel.information.action.create');
    }

    /**
     * THis methods has a role to store the information given by the user when he/she create a new information
     *
     * @param Information $information
     * @param InformationRequest $request
     * @return RedirectResponse
     */
    public function store(Information $information, InformationRequest $request): RedirectResponse
    {
        $information = Information::create($request->validated());
        $picture = $request->validated('picture');
        if ($picture !== null && !$picture->getError()){
            $data['picture'] = $picture->store('information', 'public');
        }
        $information->update($data);
        return redirect()->route('Admin.information')->with('success', 'Création de l\'information réussi');
    }

    /**
     * This methods drive us to the editing information Views
     *
     * @param string $id
     * @return View
     */
    public function modify(string $id): View 
    {
        $information = Information::findOrFail($id);
        return view('admin.visuel.information.action.edit', [
            'information' => $information
        ]);
    }

    /**
     * this methods is needed when the user update an existing information on the database
     *
     * @param string $id
     * @param Information $information
     * @param InformationUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(string $id, Information $information, InformationUpdateRequest $request) :RedirectResponse
    {
        $information = Information::findOrFail($id);
        $information->update($request->validated());
        $picture = $request->validated('picture');
        if (empty($picture)){
            $picture = $information->picture;
        } else {
            //image 1
            $data['picture'] = $picture->store('information', 'public'); 
            $information->update($data);
        }
        return redirect()->route('Admin.information.modify', ['id' => $information->id])->with('success', 'Modification réussi');
    }

    /**
     * This methods delete an information on the Database
     *
     * @param string $id
     * @param Information $information
     * @return RedirectResponse
     */
    public function delete(string $id, Information $information): RedirectResponse 
    {
        $information = Information::findOrFail($id);
        $information->delete();
        return redirect()->route('Admin.information')->with('success', 'Suppréssion réussi'); 
    }
}
