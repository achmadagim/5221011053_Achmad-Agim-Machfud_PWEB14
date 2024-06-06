<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View("register.index");
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
        $validateData = $request->validate([
            'name' => 'required|max:255', 
            'username' => ['required', 'min:3', 'max:255', 'unique:users'], 
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:5|max:20', 
        ]);

        try { 
            $validateData['password'] = Hash::make($validateData['password']); 
            User::create($validateData); 
            return redirect('/login')->with('register', "Selamat " . $validateData['name'] . ", Register berhasil"); 
        } catch (\Throwable $th) { 
            echo $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
