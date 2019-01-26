<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\Customer;
use Session;

class PagesController extends Controller
{
//index
public function index(Request $request){
    if($request->session()->get('login')){
    return view('pages.index');
}else
    return redirect('/login');
}

//about
public function about(Request $request){
    // $value= $request->session()->get('login');
    if($request->session()->get('login')){
    return view('pages.about');
      }else{
    return redirect('login');  
      }     
}

//login
public function login(Request $request){
    if($request->session()->get('login'))
    return redirect('index');
    $name = $request->input('p');

        if ($name == env("LOGIN_CRED", "abcxyz")){
            $request->session()->put('login',true);
    return redirect('index');
    }else
    return view('pages.login');
}

//new customer
public function newcust(Request $request){
    if($request->session()->get('login'))
    return view('pages.newcust');
    else
    return view('pages.login');
}


//Reports
public function reports(Request $request){
    if($request->session()->get('login'))
    return view('pages.reports');
    else
    return view('pages.login');
}

//404
public function err_404(Request $request){
    return view('inc.404');
}

//logout
    public function logout(Request $request){
        $request->session()->put('loginalert',false);
        $request->session()->flush();
        return redirect('/login');;
    }


    //new agent page navigate
    public function newagent(Request $request){
    if($request->session()->get('login'))
    return view('pages.newagent');
    else
    return view('pages.login');
}


 //new agent add
 public function newagentadded(Request $request){
    if($request->session()->get('login')){
        $name = $request->input('inputName4');
        $contact = $request->input('inputContact4');
        $email = $request->input('inputEmail');
        //Check if agent exists
        $agent = Agent::where('email', $email)->first();
                if ($agent!=''){
                $request->session()->flash('alert-danger', 'Agent "'.$email.'" already exists!');
                }else{
        //Save agent in DB
        $agent = new Agent;
        $agent->name = $name;
        $agent->contact = $contact;
        $agent->email = $email;
        $agent->accountstatus = "active";
        $agent->save();
         //display success
    $request->session()->flash('alert-success', 'New agent "'.$name.'" is successfully added!');
                }

       
    return view('pages.newagent');
      }else
    return view('pages.login');
}


//Manage Customer
public function managecust(Request $request){
    if($request->session()->get('login')){
       
        $customer = Customer::all();
                if ($customer==''){
                $request->session()->flash('alert-warning', 'You do not have any Agent!');
                }
    return view('pages.managecust', ['customers' => $customer]);
      }else
    return view('pages.login');
}


//Manage Agent
public function manageagent(Request $request){
    if($request->session()->get('login')){
            $agent = Agent::select('*')
            ->join('area', 'agent.a_id', '=', 'area.a_id')
            ->select('agent.a_id','agent.name', 'agent.contact','agent.email','agent.accountstatus','area.area_code')
            ->get();

                if ($agent==''){
                $request->session()->flash('alert-warning', 'You do not have any Agent!');
                }
    return view('pages.manageagent', ['agents' => $agent]);
      }else
    return view('pages.login');
}

//Manage Agent update
public function manageagentstatus(Request $request){
    if($request->session()->get('login')){
         
        $a_id = $request->input('a_id');
        $task = $request->input('task');
        
        $UpdateDetails= Agent::where('a_id', $a_id)->firstOrFail();
        $UpdateDetails->accountstatus = $task;
        $UpdateDetails->updated_at = now();
        $UpdateDetails->save();
            

               
    return redirect('/manageagent');
      }else
    return view('pages.login');
}

//Manage Customer update
public function managecuststatus(Request $request){
    if($request->session()->get('login')){
        // return $request;
        $c_id = $request->input('c_id');
        $task = $request->input('task');
        
        $UpdateDetails= Customer::where('c_id', $c_id)->firstOrFail();
        $UpdateDetails->accountstatus = $task;
        $UpdateDetails->updated_at = now();
        $UpdateDetails->save();
             

               
    return redirect('/managecust?step=dates');
      }else
    return view('pages.login');
}




    



}
