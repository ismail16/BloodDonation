<?php

namespace App\Http\Controllers\Doner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('doner.profile', compact('user'));
    }
}
