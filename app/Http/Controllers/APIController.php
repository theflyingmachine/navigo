<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Agent;
use File;
use Session;

class APIController extends Controller
{
    //This Controller is only for API
    public function apicall(Request $request){
        if($request->input('key')=="c98c8ec894c7adf4b348a25cb2cfe61c"){
            $task = $request->input('task');


            if($task == "checkagent"){
                $pram = $request->input('pram');
                $agent = Agent::where('email', $pram)->where('accountstatus', 'active')->first();
                if ($agent!='')
                return response()->json(['response' => 'validAgent']);
                // return response()->json(['response' => 'validagent', 'state' => 'Gujarat']);
                 else
                 return response()->json(['response' => 'invalidAgent']);
            
            
            
            
                }else
            
            return response()->json(['response' => 'invalidTask']);

          }else
          return response()->json(['response' => 'invalidKey']);
    }
    
}
