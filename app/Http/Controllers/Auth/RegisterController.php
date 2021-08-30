<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/author/dashboard';

   
    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        $user = User::create([
            'role_id' => 2,
            'name' => $data['name'],
            'date_of_birth' => $data['date_of_birth'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'blood_group' => $data['blood_group'],
            'gender' => $data['gender'],
            'division' => $data['division'],
            'district' => $data['district'],
            'thana' => $data['thana'],
            'password' => Hash::make($data['password']),
            'verifyToken' => Str::random(40),
        ]);
        // $thisuser = User::find($user->id);
        // $this->sendMail($thisuser);
        return $user;
    }
}
