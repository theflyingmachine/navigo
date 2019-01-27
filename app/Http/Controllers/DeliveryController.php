<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\Customer;
use App\DeliveryJobs;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Session;


class DeliveryController extends Controller
{


//Show Delivery  update
public function opendeliveryjob(Request $request){
    if($request->session()->get('login')){
            
        // $request->session()->put('date',date('Y-m-d'));
        $job= Customer::where('accountstatus', 'active')->get();           
        return view('pages.deliveryjob', ['jobs' => $job]);
      
      }else
    return view('pages.login');
}


public function publishdeliveryjob($key){
    if($key=='c98c8ec894c7adf4b348a25cb2cfe61c'){
            // return "Key ok";
 //Save to local DB
       //get date
       $date = Carbon::today();
        $date->addDays(1);
        $date = substr($date, 0, -9);
       //delete already published data for today
       DeliveryJobs::where('date', $date)->delete();
       //Fetch fresh data
       $jobs= Customer::where('accountstatus', 'active')->get();   
       foreach ($jobs as $job){ 
        //save in database
        $delivery_job = new DeliveryJobs;
        $delivery_job->date = $date;
        $delivery_job->c_id = $job->c_id;;
        $delivery_job->quantity = $job->quantity;;
        $delivery_job->status = "pending";
        $delivery_job->created_at = now();
        $delivery_job->updated_at = now();
        $delivery_job->save();
        }

//Delete Firestore Table




//Publish Firestore

    

    }
}





}
