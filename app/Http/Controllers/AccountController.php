<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Accounts::all();
        return view('admin.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:45|unique:account',
            'name' => 'required|string|max:45',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:45',
        ]);

        Accounts::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'Account created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Show the form for editing the specified account
    public function edit($username)
    {
        $account = Accounts::where('username', $username)->firstOrFail();
        return response()->json($account);
    }

    public function update(Request $request, $username)
    {
        $account = Accounts::where('username', $username)->firstOrFail();
        $account->update($request->all());
        return redirect()->back()->with('success', 'Account updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $account = Accounts::find($id);
        $account->delete();
        return redirect()->back()->with('success', 'Account deleted successfully.');
    }
}
