<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Student;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $users = User::count();
        $students = Student::count();
        $cstudents = Student::where('is_certified', 1)->count();
        $ncstudents = Student::where('is_certified', 0)->count();
        return view('admin.dashboard', compact('users','students','cstudents','ncstudents'));
    }
    public function profile(){
        return view('admin.profile');
    }
}
