<?php

namespace App\Http\Controllers;

use App\Models\Detail_data92;
use App\Models\User;
use App\Models\Agama92;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login92Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function logoutHandler92()
    {
        $logout = Auth::logout();

        if ($logout) {
            return redirect('/login92');
        } else {
            return back()->with('error', 'Logout gagal');
        }
    }

    public function registerHandler92(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users92',
            'password' => 'required|min:8',
            'repassword' => 'required|same:password',
            'role' => 'required|in:user,admin',
        ]);

        $userData = $request->all();
        $userData["password"] = bcrypt($request->password);
        $userData["is_active"] = $request["role"] == "user" ? 0 : 1;

        $user = new User();
        $user->fill($userData);
        $save = $user->save();

        $detailUser = new Detail_data92();
        $detailUser->id_user = $user->id;
        $detailUser->save();

        if ($save && $detailUser) {
            return redirect('/login92')->with('success', 'Register berhasil');
        } else {
            return back()->with('error', 'Register gagal');
        }
    }

    public function loginHandler92(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $isLogged = Auth::attempt($request->only('email', 'password'));

        if ($isLogged) {
            $user = Auth::user();

            if ($user->role == "user" && $user->is_active == 1) {
                return redirect('/profile92');
            }

            if ($user->role == "admin") {
                return redirect('/dashboard92');
            }

            if ($user->role == "user" && $user->is_active == 0) {
                Auth::logout();
                return back()->with('error', 'Akun anda belum di approve oleh admin');
            }
        }

        return back()->with('error', 'Username atau password salah');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
