<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\User;
use App\Models\District;
use App\Models\Thana;
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

    public function search_blood(Request $request)
    {
         // return $request;
        $division = $request->division;
        $district = $request->district;
        $thana = $request->thana;
        $blood_group = $request->blood_group;

        $search_results = User::orderByDesc('id')
                ->Where('division', 'LIKE', '%' . $division . '%')
                ->Where('district', 'LIKE', '%' . $district . '%')
                ->Where('thana', 'LIKE', '%' . $thana . '%')
                ->Where(function ($query) use ($blood_group) {
                    $query->where('blood_group', 'LIKE', '%' . $blood_group . '%')
                            ->orWhere('blood_group', 'LIKE', '%' . $blood_group . '%');
                    })
                ->Where([
                    ['status',1]
                ])
                ->Where([
                    ['role_id',2]
                ])
                ->paginate(5);
        $search_results->appends ( array (
                'blood_group' => $blood_group
        ));

        // return $search_results;

        // $users = User::where('role_id', 2)->get();

        return view('frontend.pages.search_result_blood',compact('search_results'));
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

    public function division_selector(Request $request)
    {
        $div_id = $request->div_id;
        $div_selector = District::orderBy('id', 'DESC')->where('division_id', $div_id)->get();
        return json_encode($div_selector);
    
    }

    public function district_selector(Request $request)
    {
        $dis_id = $request->dis_id;
        $dis_selector = Thana::orderBy('id', 'DESC')->where('district_id', $dis_id)->get();
        return json_encode($dis_selector);
    
    }

   
}
