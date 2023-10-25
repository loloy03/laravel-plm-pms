<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AccountInfoDistribute;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class SuperAdminController extends Controller
{
    public function post()
    {
        return view('super-admin.post');
    }
    public function create_account()
    {
        return view('super-admin.create-account');
    }
    public function register_account(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'user_type' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        //storing the data for mail purpose
        $mail_data = [
            'user_type'=> $request->user_type,
            'first_name' => $request->first_name,
            'last_name' =>  $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        //sending the account information to the email
        Mail::to($request->email)->send(new AccountInfoDistribute($mail_data));

        return redirect()->back()->with('success', 'Account Created Successfully');
    }
}
