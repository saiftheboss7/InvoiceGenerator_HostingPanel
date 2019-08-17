<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index(Request $req){
    	
    	//session('age', null);
    	$req->session()->flush();

    	return redirect()->route('home.front');
    }
}
