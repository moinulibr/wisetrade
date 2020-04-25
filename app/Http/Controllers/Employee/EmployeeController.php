<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class EmployeeController extends Controller
{

   
    public function index()
    {
        $data['title'] = "Insert Employee";
        return view('/admincontrol/employee/employee-reg',$data);
    }

    public function create(Request $request)
    {
        $validationRules =
            [
            'name' => 'required|max:50',
            'designation' => 'required|max:255',
            'salary' => 'required|numeric',
            'date' =>'required'
          
        ];

        $customMessage = [
            'name.required' => 'Name is required.',
            'designation.required' => 'Designation is required.',
            'salary.required' => 'Salary is required.',
            'date' => "Date is requried",
        ];

        $tableData = [
         
        'name' => $request->input('name'),
        'designation' => $request->input('designation'),
        'salary' => $request->input('salary'),
        'status' =>1,
        'userid' => Auth::user()->id,
        'verified' =>0,
        'created_at' => $request->input('date'),
        //'status' => $request->input('status'),
        //'userid' => $request->input('userid'),
        //'verified' => $request->input('verified'),
         
        ];

        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $insert = DB::table('employees')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Invalid information, Not Inserted!!');
        }

        return redirect()->route('employee')->with('msg', 'Inserted Successfully!');
    }


    public function view(Request $request)
    {

        $data['emplo'] = DB::table('employees')
            ->join('users', 'employees.userid', '=', 'users.id')
            ->select('employees.*','users.name as uname')
            ->where('employees.status','=',1)
            ->paginate(30);
            $data['title'] = "View Active Employee";
        return view('admincontrol.employee.all-employee', $data);

    }
    public function frozon(Request $request)
    {

        $data['emplo'] = DB::table('employees')
            ->join('users', 'employees.userid', '=', 'users.id')
            ->select('employees.*','users.name as uname')
            ->where('employees.status','=',0)
            ->paginate(30);
            $data['title'] = "View Frozen Employee";
        return view('admincontrol.employee.frozen-employee', $data);

    }

    public function edit($id)
    {

        $data['user'] = DB::table('employees')
            ->where('id', "=", $id)
            ->first();
                                            
        if(Auth::user()->type == 1 && $data['user']->verified == 1){
            return redirect()->route('allemployee');
        }
        $data['title'] = "Update Employee";
        return view('admincontrol.employee.edit-employee', $data);
    }

    public function update(Request $request, $id)
    {
        
        $data['user'] = DB::table('employees')
            ->where('id', "=", $id)
            ->first();
            
        if(Auth::user()->type == 1 && $data['user']->verified == 1){
            return redirect()->route('allemployee');
        }

        $validationRules =
            [
                'name' => 'required|max:50',
                'designation' => 'required|max:100',
                'salary' => 'required|numeric',
                'date'  => 'required',
           //'status' => 'required',
           //'userid' => 'required',
           //'verified' => 'required|numeric',
        ];

        $customMessage = [
            'name.required' => 'Name is required.',
            'designation.required' => 'Sesignation is required.',
            'salary.required|numeric' => 'Salary is required.',
            'date'  => 'Date is required',
           
        ];

        $tableData = [

        'name' => $request->input('name'),
        'designation' => $request->input('designation'),
        'salary' => $request->input('salary'),
        'status' =>1,
        'userid' =>Auth::user()->id,
        'verified' =>0,
        'updated_at' => $request->input('date'),
         
        ];

        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $update = DB::table('employees')
            ->where('id', $id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Information Not Updated!!');
        }
        return redirect()->route('allemployee')->with('msg', 'Information is Updated Successfully!!!');
        //return redirect()->route('allusers')->with('msg', 'Information is Updated Successfully!');
    }

    public function delete($id)
    {
        $data['user'] = DB::table('employees')
            ->where('id', "=", $id)
            ->first();
        if(Auth::user()->type == 1 && $data['user']->verified == 1){
            return redirect()->route('allemployee');
        }
        $tableData = [
            'status' =>0
            ];
    
            $update = DB::table('employees')
                ->where('id', $id)
                ->update($tableData);
    
            if (!$update) {
                return redirect()->back()->with('error', ' Already Actived!!');
            }
    
            return redirect()->route('allemployee')->with('msg', 'Actived Successfully!');

        if (!$delete) {
            return redirect()->back()->with('error', 'Not Deleted!!');
        }

        return redirect()->route('allemployee')->with('msg', 'Deleted Successfully!');
    }

    public function frozen($id)
    {
        $data['user'] = DB::table('employees')
            ->where('id', "=", $id)
            ->first();
        if(Auth::user()->type == 1 && $data['user']->verified == 1){
            return redirect()->route('allemployee');
        }
        
        $tableData = [
            'status' =>0
            ];
    
            $update = DB::table('employees')
                ->where('id', $id)
                ->update($tableData);
    
            if (!$update) {
                return redirect()->back()->with('error', ' Already Frozen!!');
            }
    
            return redirect()->route('allemployee')->with('msg', 'Frozen Successfully!');
        }

    public function unfrozen($id)
    {
        $data['user'] = DB::table('employees')
            ->where('id', "=", $id)
            ->first();
        if(Auth::user()->type == 1 && $data['user']->verified == 1){
            return redirect()->route('allemployee');
        }

        $tableData = [
            'status' =>1
            ];
    
            $update = DB::table('employees')
                ->where('id', $id)
                ->update($tableData);
    
            if (!$update) {
                return redirect()->back()->with('error', ' Already Unfridge!!');
            }
    
            return redirect()->route('allemployee')->with('msg', 'Unfridge Successfully!');
        }

}