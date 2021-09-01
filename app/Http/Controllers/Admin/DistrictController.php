<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Division;
use App\Models\District;

class DistrictController extends Controller
{
    public function index()
    {
        $divisions = Division::orderBy('id', 'desc')->get();
        $districts = District::orderBy('id', 'desc')->get();
        return view('admin.district.index', compact('divisions','districts'));
    }

    public function create()
    {
        $divisions = Division::orderBy('id', 'desc')->get();
        return view('admin.district.add', compact('divisions'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
          'name' => 'required',
        ]);

        $district = new District;
        $district->division_id = $request->division_id;
        $district->name = $request->name;
        $district->name_bn = $request->name_bn;
        $district->slug = $request->name;
        $district->status = $request->status;

        try{
            $district->save();
            return redirect()->route('admin.district.index')->with('message', 'District Saved Successfully !');
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
        $district = District::find($id);
        return view('admin.district.edit', compact('divisions','district'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required',
        ]);

        $district = District::find($id);

        $district->name = $request->name;
        $district->name_bn = $request->name_bn;
        $district->slug = $request->name;
        $district->status = $request->status;
        
        try{
            $district->save();
            return redirect()->route('admin.district.index')->with('message', 'District Updated Successfully !');
        }catch (\Exception $exception){
            return back()->with('danger', 'Something went wrong !');
        }
    }

    public function destroy($id)
    {
        $district = District::find($id);
        $district->delete();
        return redirect()->route('admin.district.index')->with('message', 'District Deleted Successfully !');
    }
}
