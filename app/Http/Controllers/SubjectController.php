<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubjectController extends Controller
{
    /**
     * This is used to see the subject listing views
     *
     * @return View
     */
    public function index(): View
    {
        $subject = Subject::paginate(8);
        return view('admin.gestion_ecole.subject.index', [
            'subject' => $subject
        ]);
    }

    /**
     * this methods is already used to join the subject creating views
     *
     * @return View
     */
    public function create(): View 
    {
        return view('admin.gestion_ecole.subject.action.create');
    }

    /**
     * this methods is used to save the information given of the user when he or she join the creating views
     *
     * @param Subject $subject
     * @param SubjectRequest $request
     * @return RedirectResponse
     */
    public function store(Subject $subject, SubjectRequest $request): RedirectResponse 
    {
        $subject = Subject::create($request->validated());
        return redirect()->route('Admin.subject')->with('success', 'Création de la matière réussi');
    } 

    /**
     * this methods is used to users to join the edition Subject views
     *
     * @param string $id
     * @param Subject $subject
     * @return View
     */
    public function edit(string $id, Subject $subject): View 
    {
        $subject = Subject::findOrFail($id);
        return view('admin.gestion_ecole.subject.action.edit', [
            'subject' => $subject
        ]);
    }

    /**
     * this methods is used to update our subject in the DataBase
     *
     * @param string $id
     * @param Subject $subject
     * @param SubjectRequest $request
     * @return RedirectResponse
     */
    public function update(string $id, Subject $subject, SubjectRequest $request): RedirectResponse 
    {
        $subject = Subject::findOrFail($id);
        $subject->update();
        return redirect()->route('Admin.subject.edit')->with('success', 'Modification réussi');
    } 

}
