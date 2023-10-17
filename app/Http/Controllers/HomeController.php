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
            $usertype=Auth()->user()->usertype;
            
            if ($usertype=='student') {
                return view ('dashboard');
            }
            elseif ($usertype=='super-admin') {
                return view('super-admin.super-admin-home');
            }
        }
    }
}
