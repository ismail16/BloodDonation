<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::orderBy('id','DESC')->get();
        return view('admin.event.all', compact('events'));
    }

    public function create()
    {
        return view('admin.event.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image)){
            $imagename = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('images/event')){
                mkdir('images/event',777, true);
            }
            $image->move('images/event',$imagename);
        }
        $event = new Event();
        $event->user_id = Auth::user()->id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->image = $imagename;
        $event->status = $request->status;
        $event->save();
        return redirect()->route('admin.event.index')->with('success','Successfully Added!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $event = Event::find($id);
        if(isset($image)){
            if (file_exists('images/event/'.$event->image)){
                unlink('images/event/'.$event->image);
            }
            $imagename = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('images/event')){
                mkdir('images/event',777, true);
            }
            $image->move('images/event',$imagename);
        }else{
            $imagename = $event->image;
        }

        $event->user_id = Auth::user()->id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->image = $imagename;
        $event->status = $request->status;
        $event->save();
        return redirect()->route('admin.event.index')->with('success','Successfully Updated!');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        if (file_exists('images/event/'.$event->image)){
            unlink('images/event/'.$event->image);
        }
        $event->delete();
        return back()->with('success','Successfully Deleted!');
    }
}
