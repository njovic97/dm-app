<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('pages.user.employees.employees', compact('employees'));
    }

    public function createEmployee(Request $request)
    {
        $employee = new Employee();
        $employee->employee_uuid = Str::uuid()->toString();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->speciality = $request->speciality;
        $employee->phone = $request->phone;
        $employee->save();
    }

    public function getEmployeeInfoForEdit(Request $request)
    {
        $employee = Employee::where('employee_uuid', $request->employee_uuid)->first();
        return response()->json(['employee' => $employee]);
    }

    public function editEmployee(Request $request)
    {
        $employee = Employee::where('employee_uuid', $request->employee_uuid)->first();
        if (!$employee instanceof Employee)
            return false;

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->speciality = $request->speciality;
        $employee->phone = $request->phone;
        $employee->save();
    }

    public function deleteEmployee(Request $request)
    {
        $employee = Employee::where('employee_uuid', $request->employee_uuid)->first();
        if ($employee instanceof Employee) {
            $employee->delete();
        }
    }
}
