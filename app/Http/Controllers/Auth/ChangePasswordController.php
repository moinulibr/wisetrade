<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
       return view('auth.change-password');
    }
    public function update(Request $request)
    {
      
        $this->validate($request,[
            'oldpassword'       =>'required',
            'password'           =>'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;

            if(Hash::check($request->oldpassword,$hashedPassword)){
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('login')->with('msg','Password Changed Successfully');
            }
            else{
                echo "error";
                return redirect()->back()->with('error','Current Password not Match');
            }

    }
}
