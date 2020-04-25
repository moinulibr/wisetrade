<?php

namespace App\Http\Controllers\Salary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Request;
use Carbon\Carbon;
use App\Models\Employee;
use Session;

class SalaryController extends Controller
{
   public function index(Request $request)
   {
            $year = $request->get("year");
            $month = $request->get("month");
            $salarydate =  $year."-".$month;

    

        if($year <= 0 || $month <= 0 ){
                $thismonth = date('Y-m');
            }
            else{
                $thismonth =  $salarydate ;
                Session::put('yearmonth', $thismonth);
            }
            
        $allEmployee = DB::table('salary')->select("employeeid")->where("date", "like", "$thismonth%")->count();

            if($allEmployee <= 0){
                $data['nodata'] = "No Data Found";
                return view('admincontrol.salary.create-salary',$data);  
            }
        else{
        $allEmployee = DB::table('salary')->select("employeeid")->where("date", "like", "$thismonth%")->get();    
        foreach($allEmployee as $emp){
            $empId[] = $emp->employeeid;
        }

        $data['employee'] =  DB::table('employees')
        ->select('employees.id as empid','employees.name as empname','employees.designation as empdes','employees.salary as empsalery')
        ->whereNotIn('employees.id', $empId)
        ->where("status", 1)
        ->get();
        $data['title'] = "Insert Salary";
        return view('admincontrol.salary.create-salary',$data);
        }
 }

   public function create( Request $request)
   {

    $status = $request->input("status");

    foreach($status as $st){

        $tableData[] = array(
            "employeeid" => $st,
            'date'      => $request->input("yearmonth")."-"."01",
            "amount"    => (DB::table('employees')->select("salary")->where("id", $st)->first())->salary,
            "bonus"     => $request->input("bonus_{$st}"),
            'penalty'    => $request->input("penalty_{$st}"),
            'usersid'    =>Auth::user()->id,
            'verified' => 0,
            'created_at' => date('Y-m-d'),
        );  
       
        //echo $request->input("bonus_{$st}"), "<br >";
    }


/*
    $tableData = [
        'employeeid' => $request->input('empName'),
        'date'      => date('Y-m-d H:i:s'),
        'amount'    => $request->input('amount'),
        'bonus'    => $request->input('bonus'),
        'penalty'    => $request->input('penalty'),
        'status' => 1,
        'bankid'    => $request->input('bankName'),
        'usersid'    =>Auth::user()->id,
        'verified' => 0,
        'created_at' => date('Y-m-d H:i:s'),
    ];
*/

    $insert = DB::table('salary')
        ->insert($tableData);

    if (!$insert) {
        return redirect()->back()->with('error', 'Invalid information, Not Inserted!!');
    }
    return redirect()->back()->with('msg', 'Inserted Successfully!');

}

   public function view(Request $request)
   {
        $sdate =   $request->get("sdate");
        $edate =   $request->get("edate");

        if($sdate == "" && $edate == "")
        {
            $data['edtsalary'] = DB::table('salary')
            ->join('employees', 'salary.employeeid', '=', 'employees.id')
            ->join('users', 'salary.usersid', '=', 'users.id')
            ->select('salary.*','employees.id as empid','employees.name as empname','users.id as uid','users.name as uname')
            ->where('salary.status','=',1)
            ->paginate(30); 
            $data['title'] = "View Active Salary";
            return view('admincontrol.salary.view-all-salary',$data);
        }
        else{
            $query = DB::table('salary')
            ->join('employees', 'salary.employeeid', '=', 'employees.id')
            ->join('users', 'salary.usersid', '=', 'users.id')
            ->select('salary.*','employees.id as empid','employees.name as empname','users.id as uid','users.name as uname')
            ->where('salary.status','=',1);

            if($sdate && $edate) {
                $query->where("salary.created_at", ">=",$sdate);          
                $query->where("salary.created_at", "<=", $edate);          
            }    
            else if($sdate){
                $query->where("salary.created_at", $sdate);      
            }  
            else if($edate){
                $query->where("salary.created_at", $edate);      
            } 
            $data['edtsalary'] = $query->get();
            $data['title'] = "Search Active Salary";
            return view('admincontrol.salary.view-result-all-salary',$data);
        }
   }

public function viewfrozen(Request $request){
    $sdate =   $request->get("sdate");
    $edate =   $request->get("edate");

    if($sdate == "" && $edate == "")
    {
        $data['edtsalary'] = DB::table('salary')
        ->join('employees', 'salary.employeeid', '=', 'employees.id')
        ->join('users', 'salary.usersid', '=', 'users.id')
        ->select('salary.*','employees.id as empid','employees.name as empname','users.id as uid','users.name as uname')
        ->where('salary.status','=',0)
        ->paginate(30); 
        $data['title'] = "View Frozen Salary";
        return view('admincontrol.salary.view-all-frozen-salary',$data);
    }
    else{
        $query = DB::table('salary')
        ->join('employees', 'salary.employeeid', '=', 'employees.id')
        ->join('users', 'salary.usersid', '=', 'users.id')
        ->select('salary.*','employees.id as empid','employees.name as empname','users.id as uid','users.name as uname')
        ->where('salary.status','=',0);

        if($sdate && $edate) {
            $query->where("salary.created_at", ">=",$sdate);          
            $query->where("salary.created_at", "<=", $edate);          
        }    
        else if($sdate){
            $query->where("salary.created_at", $sdate);      
        }  
        else if($edate){
            $query->where("salary.created_at", $edate);      
        } 
        $data['edtsalary'] = $query->get();
        $data['title'] = "Search Frozen Salary";
        return view('admincontrol.salary.view-result-all-salary',$data);
    }
}
   
   public function edit($id)
   {
    $data['salary'] =  DB::table('salary')
        ->select('*')
        ->where('id','=',"$id")
        ->first();

        $data['employee'] = DB::table('employees')
        ->select('id','name')
        ->get();
    $data['bank'] = DB::table('banks')
        ->select('id','name')
        ->get();
    $data['user'] = DB::table('users')
        ->select('id','name')
        ->get();
        $data['title'] = "Update Salary";
        return view('admincontrol.salary.edit-salary',$data);
   }

   public function update(Request $request, $id)
   {    
                 
        $tableData = [
            'employeeid' => $request->input('empName'),
            'date'      => date('Y-m-d H:i:s'),
            'amount'    => $request->input('amount'),
            'bonus'    => $request->input('bonus'),
            'penalty'    => $request->input('penalty'),
            //'status' => 1,
            //'bankid'    => $request->input('bankName'),
            'usersid'    =>Auth::user()->id,
            'verified' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];

    

        $update = DB::table('salary')
                ->where('id','=',"$id")
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Invalid information, Not Updated!!');
        }
        return redirect()->back()->with('msg', 'Updated Successfully!');


   }

   public function delete($id)
        {
            /*
            $delete = DB::table('salary')
            ->where('id','=',"$id")
            ->delete();
            if(!$delete){
            return redirect()->back()->with('error','Not Deleted!');
            }
            return redirect()->back()->with('msg','Deleted Successfully!');

        }*/
        return redirect()->back();
    }
   public function fridge($id)
   {
        $tableData = [
            'verified' => 0
        ];
        $update = DB::table('salary')
            ->where('id','=',"$id")
            ->update($tableData);

        if(!$update){
        return redirect()->back()->with('error','Not Unfridge!');
        }
        return redirect()->back()->with('msg','Unfridge Successfully!');
    }

}
