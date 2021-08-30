<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $users = User::count();
        return view('admin.dashboard', compact('users'));
    }
    public function profile(){
        return view('admin.profile');
    }
}
