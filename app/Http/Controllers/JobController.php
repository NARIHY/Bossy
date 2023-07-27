<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    /**
     * this methods allow us to join our views of our Listing jobs disponible
     *
     * @return View
     */
    public function index(): View
    {
        $job = Job::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.gestion_ecole.job.index',[ 
        'job' => $job
        ]);
    }

    /**
     * Methods who allow us to join the job creating views
     *
     * @return View
     */
    public function create(): View 
    {
        return view('admin.gestion_ecole.job.action.create');
    }

    /**
     * This methods allow us to store in our Bd the information entered in the creating jobViews
     *
     * @param Job $job
     * @param JobRequest $request
     * @return RedirectResponse
     */
    public function store(Job $job, JobRequest $request): RedirectResponse
    {
        $job = Job::create($request->validated());
        return redirect()->route('Admin.job')->with('success', 'Création de l\'emplois réussi');
    }

    /**
     * Methods allow us to join the editing view
     *
     * @param string $id
     * @param Job $job
     * @return View
     */
    public function edit(string $id, Job $job): View
    {
        $job = Job::findOrFail($id);
        return view('admin.gestion_ecole.job.action.edit', [
            'job' => $job
        ]);
    }


    public function update(string $id, Job $job, JobRequest $request): RedirectResponse 
    {
        $job = Job::findOrFail($id);
        $job->update($request->validated());
        return redirect()->route('Admin.job.edit', ['id' => $job->id])->with('success', 'Modification de l\'emplois réussi');
    }

}
