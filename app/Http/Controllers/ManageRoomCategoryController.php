<?php

namespace App\Http\Controllers;
use App\availableRoom;
use Illuminate\Http\Request;
use DB;
class ManageRoomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rooms = availableRoom::orderBy('created_at', 'asc')->paginate(3);
      $title = 'Admin - Category';
    //  $rooms = Room::all();
      //$rooms = Room::orderBy('created_at', 'asc')->get();
      return view('admin.category')
      ->with('title', $title)
      ->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // $room =  Room::find($id);
      // $title = 'Admin - Edit Room';
      // return view('admin.edit')
      // ->with('title', $title)
      // ->with('room', $room);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $room =  availableRoom::find($id);
            $title = 'Admin - Edit Room';
            return view('admin.edit')
            ->with('title', $title)
            ->with('room', $room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'roomType' => 'required',
        'rateForNight' => 'required',
        'availableRooms' => 'required',
        'allowedChildren' => 'required',
        'maxAdult' => 'required',
        'description' => 'required',
        'cover_image' => 'image|nullable|max:1999'
      ]);
      //file upload
      if ($request->hasFile('cover_image')) {
        //Get filename with the extesion
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just ext
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload image
        $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
      }else {
        $fileNameToStore = 'noimage.jpg';
      }

      // Create New Room Category
      $room = availableRoom::find($id);
      $room->roomType = $request->input('roomType');
      $room->rateForNight = $request->input('rateForNight');
      $room->availableRooms = $request->input('availableRooms');
      $room->allowedChildren = $request->input('allowedChildren');
      $room->maxAdult = $request->input('maxAdult');
      $room->description = $request->input('description');
      $room->cover_image = $fileNameToStore;
      // Save Message
      $room->save();

      // Redirect
      $title = 'Admin - Edit Room';
      return redirect()->back()
      ->with('title', $title)
      ->with('room', $room)
      ->with('success', 'Room Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
