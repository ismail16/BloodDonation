<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Division;
use App\Models\District;
use App\Models\Thana;

class ThanaController extends Controller
{
    public function index()
    {
        // $divisions = Division::orderBy('id', 'desc')->get();
        // $districts = District::orderBy('id', 'desc')->get();
        $thanas = Thana::orderBy('id', 'desc')->get();
        return view('admin.thana.index', compact('thanas'));
    }

    public function create()
    {
        $divisions = Division::orderBy('id', 'desc')->get();
        $districts = District::orderBy('id', 'desc')->get();
        return view('admin.thana.add', compact('divisions','districts'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
          'name' => 'required',
        ]);

        $thana = new Thana;
        $thana->division_id = $request->division_id;
        $thana->district_id = $request->district_id;
        $thana->name = $request->name;
        $thana->name_bn = $request->name_bn;
        $thana->slug = $request->name;
        $thana->status = $request->status;

        try{
            $thana->save();
            return redirect()->route('admin.thana.index')->with('message', 'Thana Saved Successfully !');
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
        $divisions = Division::orderBy('id', 'desc')->get();
        $districts = District::orderBy('id', 'desc')->get();
        $thana = Thana::find($id);
        return view('admin.thana.edit', compact('divisions','districts','thana'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required',
        ]);

        $thana = Thana::find($id);

        $thana->division_id = $request->division_id;
        $thana->district_id = $request->district_id;
        $thana->name = $request->name;
        $thana->name_bn = $request->name_bn;
        $thana->slug = $request->name;
        $thana->status = $request->status;
        
        try{
            $thana->save();
            return redirect()->route('admin.thana.index')->with('message', 'Thana Updated Successfully !');
        }catch (\Exception $exception){
            return back()->with('danger', 'Something went wrong !');
        }
    }

    public function destroy($id)
    {
        $thana = Thana::find($id);
        $thana->delete();
        return redirect()->route('admin.thana.index')->with('message', 'Thana Deleted Successfully !');
    }
}
