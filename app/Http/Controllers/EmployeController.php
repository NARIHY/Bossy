<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeRequest;
use App\Http\Requests\EmployeUpdateRequest;
use App\Models\Employee;
use App\Models\Job;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeController extends Controller
{
    /**
     * Methods who allow us to see the employee views
     *
     * @return View
     */
    public function index(): View
    {
        $employe = Employee::paginate(25);
        return view('admin.gestion_ecole.employer.index',[
            'employe' => $employe
        ]); 
    }

    /**
     * methods who allow us to join the employee view add
     *
     * @return View
     */
    public function create(): View
    {
        $job = Job::pluck('title', 'id');
        $subject = Subject::pluck('title', 'id');
        return view('admin.gestion_ecole.employer.action.create', [
            'job' => $job,
            'subject' => $subject
        ]);        
    }
    
    /**
     * Methods who allow us to add a new employees on our Bd
     *
     * @param Employee $employe
     * @param EmployeRequest $request
     * @return RedirectResponse
     */
    public function store(Employee $employe, EmployeRequest $request): RedirectResponse
    {
        $status = $request->validated('status');
        if ($status == 1) {
            $subject = $request->validated('subject');
            if ($subject === null) {
                return redirect()->route('Admin.employee.create')->with('error', 'L\'employer doit avoir au moin une matière a enseigné pour être un profésseur');
            }
        }
        $employe = Employee::create($request->validated());
        $employe->job()->sync(['employee_id' => $employe->id], $request->validated('status'));
        $employe->subject()->sync(['employee_id' => $employe->id], $request->validated('subject'));
        //image
        $picture = $request->validated('picture');
        if ($picture !== null && !$picture->getError()) {
            $data['picture'] = $picture->store('employe', 'public');
        }
        $employe->update($data);

        return redirect()->route('Admin.employee')->with('success', 'Ajout de notre employer réussi');
    }
    
    /**
     * Methods who allow us to go to the edition views of one of us many employee
     *
     * @param string $id
     * @return View
     */
    public function edit(string $id): View 
    {
        $employee = Employee::findOrFail($id);
        $job = Job::pluck('title', 'id');
        $subject = Subject::pluck('title', 'id');
        return view('admin.gestion_ecole.employer.action.edit', [
            'employee' => $employee,
            'job' => $job,
            'subject' => $subject
        ]);
    }

    /**
     * This methods is used when users update their employee information
     *
     * @param string $id
     * @param Employee $employee
     * @param EmployeUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(string $id, Employee $employee, EmployeUpdateRequest $request): RedirectResponse
    {
        $employee = Employee::findOrFail($id);
        $employee->job()->sync(['employee_id' => $employee->id], $request->validated('status'));
        $employee->subject()->sync(['employee_id' => $employee->id], $request->validated('subject'));
        //update
        $employee->update($request->validated());
        //for updating picture
        $picture = $request->validated('picture');
        if (empty($picture)){
            $picture = $employee->picture;
        } else {
            $data['picture'] = $picture->store('employe', 'public');
            $employee->update($data);
        }       
        return redirect()->route('Admin.employee.edit', ['id' => $employee->id])->with('success', 'modification réussi');
    }

    /**
     * This methods is used to se one employee information
     *
     * @param string $id
     * @return View
     */
    public function see(string $id): View 
    {
        $employee = Employee::findOrFail($id);
        return view('admin.gestion_ecole.employer.view.index', [
            'employee' =>$employee
        ]);
    }
}
