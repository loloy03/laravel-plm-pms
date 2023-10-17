<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){
            $user_type=Auth()->user()->user_type;
            
            if ($user_type=='student') {
                return view ('dashboard');
            }
            elseif ($user_type=='super-admin') {
                return view('super-admin.dashboard');
            }
            elseif ($user_type=='admin') {
                return view('admin.dashboard');
            }
        }
    }
}
