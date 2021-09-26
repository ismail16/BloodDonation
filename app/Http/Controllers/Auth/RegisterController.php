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

    protected $redirectTo = '/doner/profile';

   
    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth' => 'required',
            'phone' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'blood_group' => 'required',
            'gender' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'thana_id' => 'required',
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
            'division_id' => $data['division_id'],
            'district_id' => $data['district_id'],
            'thana_id' => $data['thana_id'],
            'password' => Hash::make($data['password']),
            'verifyToken' => Str::random(40),
        ]);
        // $thisuser = User::find($user->id);
        // $this->sendMail($thisuser);
        return $user;
        // return response()->json(['success'=>'Registration done successfully']);
    }
}
