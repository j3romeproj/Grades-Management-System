<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginPOST(Request $request)
    {
        $request->validate([
            'accountName' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'accountName' => $request->accountName,
            'password' => $request->password,
        ];

        if (Auth()->attempt($credentials)) {
            $account = Account::where('accountName', $request->accountName)->first();

            if ($account->accountType === 'S') {
                return redirect()->route('studentDashboard');
            } elseif ($account->accountType === 'F') {
                return redirect()->route('facultyDashboard');
            }
        } else {
            // Authentication failed
            return back()->withErrors([
                'credentials' => 'Invalid account name or password',
            ]); // Provide feedback to the user
        }
    }

    public function logout()
    {
        // Remove user data from the session on logout
        auth()->logout();

        return redirect()->route('studentDashboard');
    }
}
