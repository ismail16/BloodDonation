<?php

namespace App\Http\Controllers\Doner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Str;
use App\User;
use App\Models\Division;
use App\Models\District;


class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('doner.profile', compact('user'));
    }

    public function edit($id)
    {
        $divisions = Division::orderBy('id', 'desc')->get();
        $district = District::find($id);
        $user = User::find($id);
        return view('doner.edit', compact('divisions','district','user'));
    }

     public function update(Request $request, $id)
    {
        // return $request;
        $this->validate($request, [
            'name' => 'required',
            'date_of_birth' => 'required', 
            'phone' => 'required', 'email' => 'required', 
            'blood_group' => 'required', 
            'gender' => 'required', 
            'division_id' => 'required', 
            'district_id' => 'required', 
            'thana_id' => 'required'
        ]);

        $user = User::find($id);

        $image = $request->file('photo');
        $slug = Str::slug($request->name,'-');
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
        $user->division_id = $request->division_id; 
        $user->district_id = $request->district_id; 
        $user->thana_id = $request->thana_id;
        $user->donate_date = $request->donate_date;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // return $user;

        $user->save();
        return redirect()->route('doner.profile.edit', $user->id)->with('message', 'Information Updated Successfully !');
        // try{
        // }catch (\Exception $exception){
        //     return back()->with('message', $exception);
        // }
    }

}
