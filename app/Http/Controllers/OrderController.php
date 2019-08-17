<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;

class OrderController extends Controller
{
    public function index(Request $req){

		return view('index');
	}


	public function store(Request $req){

	 	/* $req->validate([
			'name' => 'required',
			'password'  => 'required',
			'email' => 'required',
			'hostingpackage' => 'required',
			'domain' => 'required',
			'phone' => 'required'
		]); */



		

			$newClient = new Client;
    	$newClient->name = $req->name;
    	$newClient->password = $req->password;
			$newClient->email = $req->email;
			$newClient->phone = $req->phone;
			$newClient->address = $req->address;
			$newClient->domain_name = $req->domain;
			$newClient->hostingType = $req->hostingpackage;
			$newClient->order_date = date("Y-m-d H:i:s");
			$effectiveDate = date("Y-m-d H:i:s", strtotime(" +12 months"));
			$newClient->expire_date = $effectiveDate;

			$FifteenDaysBefore = date("Y-m-d H:i:s", strtotime(" +350 days"));
			$SevenDaysBefore= date("Y-m-d H:i:s", strtotime(" +358 days"));
			$ThreeDaysBefore= date("Y-m-d H:i:s", strtotime(" +362 days"));

			$user = DB::table('clients')->where('email',$req->email)->first();

			if(!$user){
				$newClient->save();

				DB::table('invoices')->insert(
					['domain_name' => $req->domain, 'hostingType' => $req->hostingpackage, 'order_date' => date("Y-m-d H:i:s"),
					'expire_date' => $effectiveDate, 'email' => $req->email, 'FifteenDaysBefore' => $FifteenDaysBefore, 'SevenDaysBefore' => $SevenDaysBefore, 'ThreeDaysBefore' => $ThreeDaysBefore]);

					DB::table('client_domain_list')->insert(
						['domain_name' => $req->domain, 'hostingType' => $req->hostingpackage, 'order_date' => date("Y-m-d H:i:s"),
						'expire_date' => $effectiveDate, 'email' => $req->email]);	



				return redirect()->back()->with('message', 'Order done');
 			}
			if($user){
				return abort(403, 'Email Already Exists. You should login.');
			}

    	

			
    	//return redirect()->route('home.index');

		 
	}


}
