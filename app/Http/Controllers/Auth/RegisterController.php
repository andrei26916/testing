<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterRequest;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

use function view;

class RegisterController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registration()
    {
        return view('registration');
    }

    /**
     * @param  RegisterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $user->giveRole('user');

        return redirect()->route('login');
    }
}
