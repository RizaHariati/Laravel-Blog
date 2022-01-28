<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    public function index()
    {
        return view("login.registration");
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:50',
            'username' => 'required|unique:users',
            'password' => 'required|min:4|max:15',
            'email' => 'required|email|unique:users'
        ]);
        $validate['password'] = bcrypt($request->password);
        User::create($validate);

        $request->session()->flash('success', 'Registration was successful!');
        return redirect('/login');
    }


    public function show(Registration $registration)
    {
        //
    }


    public function edit(Registration $registration)
    {
        //
    }


    public function update(Request $request, Registration $registration)
    {
        //
    }


    public function destroy(Registration $registration)
    {
        //
    }
}
