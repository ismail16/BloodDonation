<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Division;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::orderBy('id', 'desc')->get();
        return view('admin.division.index', compact('divisions'));
    }

    public function create()
    {
        return view('admin.division.add');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
          'name' => 'required',
        ]);

        $division = new Division;
        $division->name = $request->name;
        $division->name_bn = $request->name_bn;
        $division->slug = $request->name;
        $division->status = $request->status;

        try{
            $division->save();
            return redirect()->route('admin.division.index')->with('message', 'Division Saved Successfully !');
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
        $division = Division::find($id);
        return view('admin.division.edit', compact('division'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required',
        ]);

        $division = Division::find($id);

        $division->name = $request->name;
        $division->name_bn = $request->name_bn;
        $division->slug = $request->name;
        $division->status = $request->status;
        
        try{
            $division->save();
            return redirect()->route('admin.division.index')->with('message', 'Division Updated Successfully !');
        }catch (\Exception $exception){
            return back()->with('danger', 'Something went wrong !');
        }
    }

    public function destroy($id)
    {
        $Division = Division::find($id);
        $Division->delete();
        return redirect()->route('admin.division.index')->with('message', 'Division Deleted Successfully !');
    }
}
