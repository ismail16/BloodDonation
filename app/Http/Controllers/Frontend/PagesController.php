<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\TeamMember;
use App\Models\Contact;
use App\User;
use App\Models\StudentCourse;
use App\Models\StudentInfo;
use App\Models\Course;
use App\Models\Batch;
use Illuminate\Support\Facades\Hash;

use PDF;
use App;


class PagesController extends Controller
{

    public function login()
    {
        return view('frontend.pages.login');
    }

    public function index()
    {
        // $categories = Category::where('status',1)->get();
        // $portfolios = Portfolio::where('status',1)->get();
        // $team_members = TeamMember::orderBy('serial_no','asc')->where('status',1)->get();
        return view('frontend.pages.index');
    }

    public function about_us()
    {
        return view('frontend.pages.index');
    }

    
    public function contact_post(Request $request)
    {
        // return  $request;
        $this->validate($request, [
          'name' => 'required',
          'email' => 'required',
          'message' => 'required'
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        try {
            $contact->save();
            return back()->with('success', 'Thank For Contact with Me. I will responce soon !');
            // return response()->json(['success' => 'Thank For Contact with Me. I will responce soon !'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 404);
        }
    }

   
}
