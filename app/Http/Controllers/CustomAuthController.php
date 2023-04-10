<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Userm;
use Session;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function registeruser(Request $Request)
    {
       if($Request->all())
       {

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        $Request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $Userm =  new Userm();
        $Userm->name = $Request->name;
        $Userm->email = $Request->email;
        $Userm->password =  Hash::make($Request->password);
        // 'password' => Hash::make($request->newPassword);
        $Reg = $Userm->save();
        
         if($Reg)
         {
            return Back()->with('success','you have register successfully...!');
         }
         else
         {
            return Back()->with('fail','somthing wrong...!');
         }
       }
    }
    public function loginuser(Request $Request)
    {
        if($Request->all())
        {
            $Request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);

            $Userm = Userm::where('email','=',$Request->email)->first();

                if ($Userm)
                {
                    if(Hash::check($Request->password,$Userm->password))
                    {
                        $Request->Session()->put('loginuseremail',$Userm->email);
                        $Request->Session()->put('id',$Userm->id);
                        return redirect('dashboard');
                    }
                    else
                    {
                        return Back()->with('fail','This paasword is not valide ...!');
                    }
                }
                else
                {
                    return Back()->with('fail','This email is not register ...!');
                }
        }
    }
    public function dashboard()
    {
        $data = array();
        if(Session::has('loginuseremail'))
        {
            $data = Userm::where('email','=',Session::get('loginuseremail'))->first();

        }
        return view('dashbord',compact('data'));
    }
    public function logout()
    {
        if(Session::has('loginuseremail'))
        {
            Session::pull('loginuseremail');
            return redirect('login');
        }
    }
}
