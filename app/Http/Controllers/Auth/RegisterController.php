<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Territory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $territories = Territory::all();
        return view('auth.register', compact('territories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'nic' => $request->nic,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'gender' => $request->gender,
            'territory_id' => $request->territory_id,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin
        ]);

//        auth()->attempt($request->only('username', 'password'));

        return redirect()->route('dashboard')->with('success', 'User successfully inserted!');
    }

}
