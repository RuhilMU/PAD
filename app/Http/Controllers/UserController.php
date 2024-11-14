<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_user = User::all();

        return view('manajemen.pegawai', compact('data_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manajemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ]);
        
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role = 'pegawai';
            $user->save();

            return redirect('/pegawai');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('manajemen.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:5',
        ]);

            $user = User::find($user_id);
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            
            $user->save();

        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
        return redirect('/pegawai');
    }

    public function search(Request $request)
    {
        $cari = $request->nama;
        $data_user = User::where('name', 'like', "%" . $cari . "%")
                        ->get();
        $jumlah_user = User::count();
        return view('manajemen.pegawai', [
            'data_user' => $data_user,
            'cari' => $cari ?? null, 
            'jumlah_user' => $jumlah_user,
        ]);
    }
}
