<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

use function back;
use function redirect;
use function view;

class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('login');
    }

    /**
     * @param  AuthRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth(AuthRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('show');
        }

        return back()->withErrors([
            'email' => 'Неправильный email или пароль',
        ])->onlyInput('email');
    }
}
