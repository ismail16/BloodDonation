<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TeamMember;

class TeamMemberController extends Controller
{
    public function index()
    {
        $team_members = TeamMember::orderBy('id', 'desc')->get();
        return view('admin.team_member.index', compact('team_members'));
    }

    public function create()
    {
        // $team_members = TeamMember::orderBy('id', 'desc')->get();
        return view('admin.team_member.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'department' => 'required',
          'designation' => 'required'
        ]);

        // name mobile email department designation profile_image facebook twitter instagram linkedin status

        $team_member = new TeamMember;

        $image = $request->file('profile_image');
        $slug = Str::slug($request->name, '-');
        if (isset($image)){
            $imagename = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('images/profile')){
                mkdir('images/profile', 777, true);
            }
            $image->move('images/profile',$imagename);
            $team_member->profile_image = $imagename;
        }
        $team_member->name = $request->name;
        $team_member->department = $request->department;
        $team_member->designation = $request->designation;
        $team_member->facebook = $request->facebook;
        $team_member->twitter = $request->twitter;
        $team_member->instagram = $request->instagram;
        $team_member->linkedin = $request->linkedin;
        $team_member->status = $request->status;
        $team_member->serial_no = $request->serial_no;

        try{
            $team_member->save();
            return redirect()->route('admin.team-member.index')->with('message', 'Team Member Saved Successfully !');
        }catch (\Exception $exception){
            return back()->with('danger', 'Something went wrong !');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $team_member = TeamMember::find($id);
        return view('admin.team_member.edit', compact('team_member'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required',
          'department' => 'required',
          'designation' => 'required'
        ]);

        $team_member = TeamMember::find($id);

        $image = $request->file('profile_image');
        $slug = Str::slug($request->title,'-');
        if (isset($image)){
            if ($team_member->profile_image) {
                if (file_exists('images/profile/'.$team_member->profile_image)){
                    unlink('images/profile/'.$team_member->profile_image);
                }
            }
            $profile_imagename = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/profile',$profile_imagename);
            $team_member->profile_image = $profile_imagename;
        }

        $team_member->name = $request->name;
        $team_member->department = $request->department;
        $team_member->designation = $request->designation;
        $team_member->facebook = $request->facebook;
        $team_member->twitter = $request->twitter;
        $team_member->instagram = $request->instagram;
        $team_member->linkedin = $request->linkedin;
        $team_member->status = $request->status;
        $team_member->serial_no = $request->serial_no;
        
        try{
            $team_member->save();
            return redirect()->route('admin.team-member.index')->with('message', 'Team Member Updated Successfully !');
        }catch (\Exception $exception){
            return back()->with('danger', 'Something went wrong !');
        }
    }

    public function destroy($id)
    {
        $team_member = TeamMember::find($id);
        if ($team_member->profile_image) {
            if (file_exists('images/profile/'.$team_member->profile_image)){
                unlink('images/profile/'.$team_member->profile_image);
            }
        }
        $team_member->delete();
        return redirect()->route('admin.team-member.index')->with('message', 'Team Member Deleted Successfully !');
    }
}
