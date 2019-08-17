<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;

class LoginController extends Controller
{
    public function index(Request $req){

		return view('login.index');
    }


    public function postLogin(Request $req){

        $user = DB::table('clients')->where('email',$req->email)->where('password', $req->password)->first();
        $findID = DB::select( DB::raw("SELECT id FROM clients WHERE email = '$req->email' AND password = '$req->password'") );

			
        if(!$user){
            return abort(403, 'Login failed due to email/password mismatch');
         }
        else if($user){

            $req->session()->put('UserSessionEmail', $user->email);
            $req->session()->put('name', $user->name);
            $req->session()->put('role', $user->id);
            
    		    return redirect()->route('home.index');
        }
   
    }


    public function profile(Request $req){

      $user = DB::table('clients')->where('email',$req->email)->where('password', $req->password)->first();


		return view('home.index')->with('myUser', $user);;
    }



    



	


}
