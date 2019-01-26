<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use File;
use Session;


class CustomerController extends Controller
{
    //

    //add new customer
public function addnewcust(Request $request){
    if($request->session()->get('login')){
        //store Img
     $request->homeimage->store('homeimage');
            //get has file name
             $hashFilename = $request->homeimage->hashName();
    $name = $request->input('inputName4');
    $contact = $request->input('inputContact4');
    $address = $request->input('inputAddress');
    $latitude = $request->input('inputlat4');
    $longitude = $request->input('inputlong4');
    $quantity = $request->input('inputQuantity');
    $notes = $request->input('inputNotes');
    $area_code = $request->input('sector');


     //insert to database
     $customer = new Customer;
     $customer->name = $name;
     $customer->contact = $contact;
     $customer->latitude = $latitude;
     $customer->longitude = $longitude;
     $customer->area_code = $area_code;
     $customer->address = $address;
     $customer->quantity = $quantity;
     $customer->notes = $notes;
     $customer->homeimage = $hashFilename;
     $customer->accountstatus = "pending";
    
     $customer->save();

     return view('pages.newcustadded');

//    return view('pages.newcust');
    }else
    return view('pages.login');
}

}
