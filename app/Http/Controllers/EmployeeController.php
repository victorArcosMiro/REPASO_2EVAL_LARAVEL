<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function showEmployees(){
        $employeeList = Employee::all();
        return view('employee.all', ['employeeList'=>$employeeList]);
    }

    public function create() {
        $employee = Employee::all();
        return view('employee.form', array('employee' => $employee));
    }
      public function edit($id) {
        $employee = Employee::find($id);
        return view('employee.form', ['employee' => $employee]);
    }
    public function update($id, Request $r) {
        $p = Employee::find($id);
        $p->name = $r->name;
        $p->surname = $r->surname;
        $p->department = $r->department;
        $p->functions = $r->functions;
        $p->save();
        return redirect()->route('employee.show');
    }
    public function destroy(){

    }
}
