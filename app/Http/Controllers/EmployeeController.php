<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check())
        {
            return view('employees.index', [
            'employees' => DB::table('employees')
                ->join('factories','employees.factory_id','=','factories.id')
                ->select('employees.*','factories.factory_name')
                ->paginate(2)
            ]);
        }
            return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check())
        {

            $data['factories'] = Factory::get(["factory_name", "id"]);
            return view('employees.create',$data);
        }
            return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Employee::create($request->all());
        return redirect()->route('employees.index')
                ->withSuccess('New Employee is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        if(Auth::check())
        {
            $data['factories'] = Factory::where('id', $employee->factory_id)->pluck('factory_name');
            return view('employees.show', [
                'employee' => $employee
            ], $data);

        }
            return redirect()->route('login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        if(Auth::check())
        {
            $data['factories'] = Factory::get(["factory_name", "id"]);
            
            $data['f_id'] = $employee->factory_id;
            return view('employees.edit', [
                'employee' => $employee
            ],$data);

        }
            return redirect()->route('login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employees.index')
                ->withSuccess('Employee is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')
                ->withSuccess('Employee is updated successfully.');
    }
}
