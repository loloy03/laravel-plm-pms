<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){
            $user_type=Auth()->user()->user_type;
            
            if ($user_type=='student') {
                return view ('student.dashboard');
            }
            elseif ($user_type=='super-admin') {
                return Redirect::route('create-account');
            }
            elseif ($user_type=='admin') {
                return view('admin.dashboard');
            }
        }
    }
}
