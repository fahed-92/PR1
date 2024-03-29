<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'first-name' => ['required', 'string', 'max:255'],
            'last-name' => ['required', 'string', 'max:255'],
            'father-name' => ['required', 'string', 'max:255'],
            'mother-name' => ['required', 'string', 'max:255'],
            'nationality' => ['required', 'string'],
            'n-number' => ['required', 'integer'],
            'governorate' => ['required', 'string', 'max:255'],
            'image' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User|Application|RedirectResponse|Redirector
     */
    protected function create(array $data)
    {
//        $this->validator($data)->validate();
//
//        event(new Registered($user = $this->create($data)));
//
//        $this->guard()->login($user);


        $user=User::create([
            'first-name' => $data['first-name'],
            'last-name' => $data['last-name'],
            'father-name' => $data['father-name'],
            'mother-name' => $data['mother-name'],
            'age' => $data['age'],
            'n-number' => $data['n-number'],
            'nationality' => $data['nationality'],
            'governorate' => $data['governorate'],
            'image' => $data['image'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
         $this->guard()->login($user);

//        auth()->login($user);
        return redirect()->route('home')
            ->with('success', 'Welcome ' . $user->name . '!');
//        return redirect('elctionprog.get');
    }
}
