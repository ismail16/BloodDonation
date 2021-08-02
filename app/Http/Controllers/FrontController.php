<?php

namespace App\Http\Controllers;

use App\Event;
use App\Slider;
use App\Staff;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('front.welcome', compact('sliders'));
    }
    public function about(){
        $staffs = Staff::where('status',1)->get();
        return view('front.about', compact('staffs'));
    }
    public function contact(){
        return view('front.contact');
    }
    public function program(){
        return view('front.program');
    }
    public function event(){
        $events = Event::where('status',1)->paginate(3);
//        return $events;
        return view('front.event', compact('events'));
    }
    public function test(){
        $test = '<h1>This is for testing</h1>';
        return view('front.test', compact('test'));
    }
}
