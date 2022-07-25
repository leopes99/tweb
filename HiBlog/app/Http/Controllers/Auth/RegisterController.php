<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    

        protected function redirectTo() {        
        $role = auth()->user()->role;
        switch ($role) {
            case 'admin': return '/profile';
                break;
            case 'staff': return '/profile';
                break;
            case 'utente': return '/profile';
                break;
            default: return '/';
        };
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:25'],
            'cognome' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:6', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], 
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'datanascita' => ['required','date','before:today'],
            'telefono' => ['required', 'numeric', 'digits_between:8,11'],
            'role' => ['required','string'],
  
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
        protected function create(array $data)
    {
        return User::create([
            'nome' => $data['nome'],
            'cognome' => $data['cognome'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'],
            'data_nascita'=> $data['datanascita'],
            'telefono' => $data['telefono'],
            'genere'=> $data['genere'],
            'role' => $data['role'],
            
            
        ]);
    }
    
}
