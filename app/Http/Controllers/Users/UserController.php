<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('home');

    }

    public function admincontrol()
    {
        $data['title'] = "Insert User" ;
        return view('/admincontrol/users/user-reg',$data);
    }

    public function create(Request $request)
    {
        /*
        if ($request->input('password') != $request->input('password_confirmation')) {
            echo "Password Not match!";
        }*/

        $validationRules =
            [
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            //'password' => 'required',
            'contract' => 'required|max:13',
            'password' => 'required|required_with:password_confirmation|string|confirmed',
            'current_password' => 'required',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'joiningdata' => 'required',
            //'statusstudent' => 'required|numeric',
        ];

        $customMessage = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
            'password.required' => 'Password Required and password is not match!.',
            'contract.required' => 'Contact is required',
            'joiningdata' => 'Joining Date is required',
        ];

        $tableData = [
            //'userid' => Auth::user()->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'contract' => $request->input('contract'),
            //'status' => ,
            'type' => Auth::user()->type,
            'created_at' => $request->input('joiningdata'),
            /*
        'name' => $request->input('elevel'),
        'designation' => $request->input('earea'),
        'salary' => $request->input('dname'),
        'status' => $request->input('iname'),
        'userid' => $request->input('iname'),
        'verified' => $request->input('iname'),
         */
        ];
print_r($tableData);
        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $insert = DB::table('users')
            ->insert($tableData);

        if (!$insert) {
            return redirect()->back()->with('error', 'Invalid information, Not Inserted!!');
        }

        return redirect()->route('adminregister')->with('msg', 'Inserted Successfully!');
    }

    public function view(Request $request)
    {
        $data['title'] = "Active User" ;

        $data['user'] = DB::table('users')
            ->select('*')
            ->where('status',1)
            ->paginate(30);
        return view('admincontrol.users.all-user', $data);

    }
    public function viewFrozen(Request $request)
    {
        $data['title'] = "Frozen User" ;
        $data['user'] = DB::table('users')
            ->select('*')
            ->where('status',0)
            ->paginate(30);
        return view('admincontrol.users.frozen-user', $data);

    }

    public function edit($id)
    {
        $data['user'] = DB::table('users')
            ->where('id', "=", $id)
            ->first();
       
        /*
            if(Auth::user()->type == 1 && $data['user']->verified == 1){
                return redirect()->route('allusers');
            }
        */  
        return view('admincontrol.users.edit-user', $data);
    }

    public function update(Request $request, $id)
    {
        /*
        if(Auth::user()->type == 1 && $data['user']->verified == 1){
            return redirect()->route('allusers');
        }
        */
        $validationRules =
            [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'contract' => 'required',
            'joiningdata' => 'required'
            //'statusstudent' => 'required|numeric',
        ];

        $customMessage = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
            'contract.required' => 'Contract is required',
            'joiningdata' => 'Joining Date is required',
        ];

        $tableData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'contract' => $request->input('contract'),
            //'status' => ,
            'type' => Auth::user()->type,
            'updated_at' => $request->input('joiningdata'),
            /*
        'name' => $request->input('elevel'),
        'designation' => $request->input('earea'),
        'salary' => $request->input('dname'),
        'status' => $request->input('iname'),
        'userid' => $request->input('iname'),
        'verified' => $request->input('iname'),
         */
        ];
        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $update = DB::table('users')
            ->where('id', $id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Information Not Updated!!');
        }
        return redirect()->route('allusers')->with('msg', 'Information is Updated Successfully!!!');
        //return redirect()->route('allusers')->with('msg', 'Information is Updated Successfully!');

/*
$update = DB::table('users')
->where('id',"=",$id)
->update($tableData);

if (!$update) {
return redirect()->back()->with('error', 'Invalid information, Not Inserted!!');
}

return redirect()->route('home')->with('msg', 'Updated Successfully!');
 */
    }

    public function active($id)
    {
            /*
        if(Auth::user()->type == 1 && $data['user']->verified == 1){
            return redirect()->route('allusers');
        }
        */
        $tabledata = [
            'status' => 1
        ];
        $update = DB::table('users')
            ->where("id", "=", "$id")
            ->update($tabledata);

        if (!$update) {
            return redirect()->back()->with('error', 'Not Actived!!');
        }

        return redirect()->route('frozenuser')->with('msg', 'Actived Successfully!');


    }
    public function fridge($id)
    {
            /*
        if(Auth::user()->type == 1 && $data['user']->verified == 1){
            return redirect()->route('allusers');
        }
        */
        $tabledata = [
            'status' => 0
        ];
        $update = DB::table('users')
            ->where("id", "=", "$id")
            ->update($tabledata);

        if (!$update) {
            return redirect()->back()->with('error', 'Not Frozen!!');
        }

        return redirect()->route('allusers')->with('msg', 'Frozen Successfully!');

    }

}
