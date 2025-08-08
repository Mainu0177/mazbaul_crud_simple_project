<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function Employee(){
        $employees = Employee::latest()->get();
        return view('pages.index', compact('employees'));
    }
    public function CreateEmployee(){
        return view('pages.create');
    }
    public function Store(Request $request){
        try {
            $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable',
        ]);

        Employee::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);
        flash()->success('Employee created successfully!');
        // \Log::info('Employee Created:', $create->toArray());
        return redirect()->route('employee.index');
        // return $create;
        } catch (Exception $e) {
            return response()->json([
                // 'message' => $e->getMessage()
            ]);
        }
    }
    public function UpdateEmployee($id){
        $employee = Employee::where('id', $id)->firstOrFail();
        return view('pages.update', ['employee' => $employee]);
    }

    public function Update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$id,
            'phone' => 'nullable',
        ]);
        Employee::where('id', $id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);
        flash()->success('Employee updated successfully!');
        return redirect()->route('employee.index');
    }
    public function EmployeeDelete($id){
            Employee::where('id', $id)->delete();
            // flash()->success('Employee deleted successfully!');
            sweetalert('Employee deleted successfully!.');
            return redirect()->route('employee.index');
    }
}
