<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->where('role_id', 2)->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'date_of_birth' => 'required', 
            'phone' => 'required', 'email' => 'required', 
            'blood_group' => 'required', 
            'gender' => 'required', 
            'division' => 'required', 
            'district' => 'required', 
            'thana' => 'required',
        ]);

        $user = new User;

        $image = $request->file('photo');
        $slug = Str::slug($request->name, '-');
        if (isset($image)){
            $imagename = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('images/profile_image')){
                mkdir('images/profile_image', 777, true);
            }
            $image->move('images/profile_image',$imagename);
            $user->photo = $imagename;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->blood_group = $request->blood_group; 
        $user->date_of_birth = $request->date_of_birth;
        $user->division = $request->division; 
        $user->district = $request->district; 
        $user->thana = $request->thana;
        $user->password = Hash::make($request->password);


        // return $user;

        try{
            $user->save();
            return redirect()->route('admin.user.index')->with('message', 'User Saved Successfully !');
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
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'date_of_birth' => 'required', 
            'phone' => 'required', 'email' => 'required', 
            'blood_group' => 'required', 
            'gender' => 'required', 
            'division' => 'required', 
            'district' => 'required', 
            'thana' => 'required'
        ]);

        $user = User::find($id);

        $image = $request->file('photo');
        $slug = Str::slug($request->title,'-');
        if (isset($image)){
            if ($user->photo) {
                if (file_exists('images/profile_image/'.$user->photo)){
                    unlink('images/profile_image/'.$user->photo);
                }
            }
            $profile_imagename = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/profile_image',$profile_imagename);
            $user->photo = $profile_imagename;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->blood_group = $request->blood_group; 
        $user->date_of_birth = $request->date_of_birth;
        $user->division = $request->division; 
        $user->district = $request->district; 
        $user->thana = $request->thana;
        $user->status = $request->status;
        
        try{
            $user->save();
            return redirect()->route('admin.user.index')->with('message', 'User Updated Successfully !');
        }catch (\Exception $exception){
            return back()->with('danger', 'Something went wrong !');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->photo) {
            if (file_exists('images/profile_image/'.$user->photo)){
                unlink('images/profile_image/'.$user->photo);
            }
        }
        $user->delete();
        return redirect()->route('admin.user.index')->with('message', 'User Deleted Successfully !');
    }
}
