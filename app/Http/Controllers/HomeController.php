<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reqEmail = request()->session()->get('UserSessionEmail');

        $account = DB::select( DB::raw("Select e.*, d.* from client_domain_list e, hosting_packages d where e.hostingType=d.id AND e.email = '$reqEmail'") );


        return view('home.services')->with('customers', $account);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = request()->session()->get('role');

        if ($role==$id){
        $acc = Client::find($id);
        return view('home.profile')->with('account', $acc);}
        
        else{
            abort(403, 'Unauthorized action! ❌');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $account = Client::find($id);
    	$account->name 	=   $req->name;
    	$account->password 	= $req->password;
    	$account->phone 	= $req->phone;
    	$account->address 	= $req->address;
    	$account->save();
        
        return redirect()->route('profile.show', $account['id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getNewOrder(Request $req)
    {
        return view('home.order');
    }

    public function postNewOrder(Request $req)
    {
        
        $user = DB::table('client_domain_list')->where('domain_name', $req->domain_name)->first();

			
        if(!$user){
            $hostingType = $req->hostingType;

                $domain_name = $req->domain_name;
			    $order_date = date("Y-m-d H:i:s");
                $expire_date = date("Y-m-d H:i:s", strtotime(" +12 months"));
                
                $reqEmail = request()->session()->get('UserSessionEmail');

                $FifteenDaysBefore = date("Y-m-d H:i:s", strtotime(" +350 days"));
                $SevenDaysBefore= date("Y-m-d H:i:s", strtotime(" +358 days"));
                $ThreeDaysBefore= date("Y-m-d H:i:s", strtotime(" +362 days"));

                DB::table('invoices')->insert(
					['domain_name' => $domain_name, 'hostingType' => $hostingType, 'order_date' => date("Y-m-d H:i:s"),
					'expire_date' => $expire_date, 'email' => $reqEmail, 'FifteenDaysBefore' => $FifteenDaysBefore, 'SevenDaysBefore' => $SevenDaysBefore, 'ThreeDaysBefore' => $ThreeDaysBefore]);

					DB::table('client_domain_list')->insert(
						['domain_name' => $domain_name, 'hostingType' => $hostingType, 'order_date' => date("Y-m-d H:i:s"),
						'expire_date' => $expire_date, 'email' => $reqEmail]);	
            
    		    return redirect()->route('home.services');
            
         }
        else if($user){
            return abort(403, 'Domain already exists in database. Please contact us for further query.');
        }
    }



}
