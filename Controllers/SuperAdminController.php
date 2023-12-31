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
    public function account_list(Request $request)
    {
        // Retrieve the query parameter for sorting
        $sortBy = $request->query('sort');

        // Default sorting (if no specific sorting is requested)
        $defaultSort = 'user_type';

        // Get all accounts
        $accounts = User::query();

        // Sort by user type
        if ($sortBy === 'admin') {
            $accounts->where('user_type', 'admin');
        } elseif ($sortBy === 'super-admin') {
            $accounts->where('user_type', 'super-admin');
        } elseif ($sortBy === 'student') {
            $accounts->where('user_type', 'student');
        } elseif ($sortBy === 'doctor') {
            $accounts->where('user_type', 'doctor');
        } else {
            // Default sorting by user type
            $accounts->orderBy($defaultSort);
        }

        $accounts = $accounts->get();

        return view('super-admin.account-list', compact('accounts'));
    }

    public function account_search(Request $request)
    {
        $query = $request->get('q');

        $accounts = User::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('last_name', 'like', '%' . $query . '%')
                ->orWhere('first_name', 'like', '%' . $query . '%');
        })->get();

        // Return the accounts to the view.
        return view('super-admin.account-list', compact('accounts'));
    }
    public function account_delete($id)
    {
        // Find the user by ID
        $user = User::find($id);

        if ($user) {
            // Delete the user
            $user->delete();
        }

        return redirect()->back()->with('success', 'Account Deleted Successfully');
    }
    public function account_show($id)
    {
        $account = User::find($id);

        return view('super-admin.account-show', compact('account'));
    }

    public function account_edit($id)
    {
        // Fetch the account details based on the $id
        $account = User::find($id);

        // Validate the incoming request data
        $validatedData = request()->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_type' => 'sometimes|string|max:255', // Make 'user_type' optional
        ]);

        // Update only 'first_name' and 'last_name' fields
        $account->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
        ]);

        // Check if 'user_type' is present in the request before updating
        if (request()->has('user_type')) {
            $account->update(['user_type' => request('user_type')]);
        }

        return redirect()->back()->with('success', 'Account updated successfully!');
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
            'user_type' => $request->user_type,
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
