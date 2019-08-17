<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\invoice;
use Illuminate\Http\Request;
use Faker\Provider\zh_TW\DateTime;

class AdminController extends Controller
{
    public function index(Request $req){

        if($req->session()->has('adminEmail'))
        {
            return view('admin.dashboard');
        }

        else{
		return view('admin.index');}
    }

    public function postLogin(Request $req){

        
        $user = DB::table('admins')->where('email',$req->email)->where('password', $req->password)->first();

			
        if(!$user){
            return abort(403, 'Login failed due to email/password mismatch');
         }
        else if($user){

            $req->session()->put('adminEmail', $user->email);
            $req->session()->put('name', $user->name);
            
    		    return view('admin.dashboard');
        }
    }

    public function getClient(Request $req){

        if($req->session()->has('adminEmail')){
            $data = DB::select( DB::raw("Select e.*, d.id as HostingID, d.package_name from clients e, hosting_packages d where e.hostingType=d.id") );

        return view('admin.clients')->with('data', $data);}
        
        else {
            return view('admin.index');}
    }

    public function getAllInvoices(Request $req){

        if($req->session()->has('adminEmail'))
        {

        $data = DB::select( DB::raw("Select e.*, c.name, s.statusName, c.email, c.phone, a.name as admin_name, d.id as hostingid, d.package_name from invoices e, status s, clients c, admins a, hosting_packages d where e.email=c.email and e.hostingType=d.id and s.id=e.status") );

        return view('admin.invoices')->with('data', $data);}
        
        else{
            return view('admin.index');}
    }

    public function getInvoiceDetails(Request $req, $id){

        if($req->session()->has('adminEmail')){


            //$acc = DB::select( DB::raw("Select e.* from invoices e, status s where e.status=s.id and e.id = :somevariable"), array(
                //'somevariable' => $id,));

                


        $acc = invoice::find($id);
        return view('admin.invoicedetails')->with('account', $acc);}
        
        else{
            return view('admin.index');}
    }


    public function postInvoiceDetails(Request $req, $id){

        $account = invoice::find($id);

            $domain_name = $req->domain_name;
            $hostingType = $req->hostingType;
            $order_date = $req->order_date;

        
        if($account->expire_date == $req->expire_date) {

            $account->email = $req->email;
            $account->status = $req->status;
            $account->modifiedBy = $req->session()->get('adminEmail');
            $account->notes = $req->note;
            $account->save();


            return redirect()->route('admin.invoices');

        }

        else {

            $account->email = $req->email;
            
            //$account->save();


            $effectiveDate = date_create_from_format('Y-m-d', $req->expire_date);

            $effectiveDate1 = date_create_from_format('Y-m-d', $req->expire_date);
            $effectiveDate2 = date_create_from_format('Y-m-d', $req->expire_date);
            $effectiveDate3 = date_create_from_format('Y-m-d', $req->expire_date);

           

			$FifteenDaysBefore = date_sub($effectiveDate1,date_interval_create_from_date_string("15 days"));
			$SevenDaysBefore = date_sub($effectiveDate2,date_interval_create_from_date_string("7 days"));
            $ThreeDaysBefore = date_sub($effectiveDate3, date_interval_create_from_date_string('3 days'));



            
            DB::table('invoices')->insert(['domain_name' => $domain_name, 'hostingType' => $hostingType, 'order_date' => $req->order_date, 'expire_date' => $effectiveDate, 'email' => $req->email, 'FifteenDaysBefore' => $FifteenDaysBefore->format('Y-m-d H:i:s'), 'SevenDaysBefore' => $SevenDaysBefore->format('Y-m-d H:i:s'), 'ThreeDaysBefore' => $ThreeDaysBefore->format('Y-m-d H:i:s')]);


                
                //return view('admin.test')->with('json', $FifteenDaysBefore);

                return redirect()->route('admin.invoices');

        }

    	
        
        
    }

    public function show($id){

    	$acc = Client::find($id);
    	return view('admin.profile')->with('account', $acc);
    }


    public function destroyInvoice($id){

        $acc = invoice::find($id);
        $acc->delete();

    	return redirect()->route('admin.invoices');
    }
}
