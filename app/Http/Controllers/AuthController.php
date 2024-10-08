<?php

namespace App\Http\Controllers;

use App\Interfaces\AuthenticationInterface;
use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\RegistrationRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    private AuthenticationInterface $authInterface;
    public function __construct(AuthenticationInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }

    public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {

            if ($this->authInterface->login($data))
                return redirect()->route('dashboard');
            else
                return back()->with('error', 'Email ou mot de passe incorrect(s).');
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survnue lors du traitement, Réessayez !');
        }
    }

    public function registration(RegistrationRequest $request)
    {
        $data = [

            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {

            $user = $this->authInterface->registration($data);

            Auth::login($user);

            return redirect()->route('dashboard');
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survnue lors du traitement, Réessayez !');
        }
    }
}
