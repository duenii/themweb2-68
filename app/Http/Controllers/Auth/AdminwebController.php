<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminwebController extends Controller
{
    public function index()
    {
        if(Auth::id()){
            
            $role_as=Auth()->user()->role_as;

            if($role_as=='user'){
                return view('dashboard');
            }
            elseif($role_as=='admin'){
                
                $adminweb = User::all();
                return view('auth.adminweb.index', compact('adminweb'));

            }

        }
        
       
        //return $Banners;
        
    }
   

}
