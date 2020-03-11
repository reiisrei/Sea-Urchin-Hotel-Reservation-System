<?php

namespace App\Http\Controllers;
use App\Settings;
use App\roomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $standard = roomType::select('roomTypeID','title','nightRate','capacity','childrenAllowed','maxAdult','description','cover_image')->where('roomTypeID', 1)->first(); //Get specific data in the database
      $quad = roomType::select('roomTypeID','title','nightRate','capacity','childrenAllowed','maxAdult','description','cover_image')->where('roomTypeID', 2)->first();
      $family = roomType::select('roomTypeID','title','nightRate','capacity','childrenAllowed','maxAdult','description','cover_image')->where('roomTypeID', 3)->first();
      $barkada = roomType::select('roomTypeID','title','nightRate','capacity','childrenAllowed','maxAdult','description','cover_image')->where('roomTypeID', 4)->first();
      $title = 'Settings';
      return view('admin.settings')
      ->with('standard', $standard)
      ->with('quad', $quad)
      ->with('family', $family)
      ->with('barkada', $barkada)
      ->with('title', $title);
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
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
    public function standard(Request $request)
    {
      //file upload
        $title = 'Settings';
        DB::table('room_types')
          ->where('roomTypeID', '=', 1)
          ->update(['title'=> $request->title, 'nightRate'=> $request->nightRate, 'capacity'=> $request->capacity, 'childrenAllowed'=> $request->childrenAllowed, 'maxAdult'=> $request->maxAdult, 'description'=> $request->description]);
        return redirect()->back()
        ->with('title', $title);
    }
    public function standardPhoto(Request $request)
    {
      $this->validate($request, [
      'cover_images' => 'image|max:1999|required'
    ]);
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

      $title = 'Settings';
      DB::table('room_types')
        ->where('roomTypeID', '=', 1)
        ->update(['cover_image'=> $fileNameToStore]);
      return redirect()->back()
      ->with('title', $title);
    }

    public function quad(Request $request)
    {

      $title = 'Settings';
      DB::table('room_types')
        ->where('roomTypeID', '=', 2)
        ->update(['title'=> $request->title, 'nightRate'=> $request->nightRate, 'capacity'=> $request->capacity, 'childrenAllowed'=> $request->childrenAllowed, 'maxAdult'=> $request->maxAdult, 'description'=> $request->description]);
          return redirect()->back()
          ->with('title', $title);
    }
    public function quadPhoto(Request $request)
    {
      $this->validate($request, [
      'cover_images' => 'image|max:1999|required'
    ]);

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

      $title = 'Settings';
      DB::table('room_types')
        ->where('roomTypeID', '=', 2)
        ->update(['cover_image'=> $fileNameToStore]);
      return redirect()->back()
      ->with('title', $title);
    }

    public function family(Request $request)
    {

        $title = 'Settings';
        DB::table('room_types')
          ->where('roomTypeID', '=', 3)
          ->update(['title'=> $request->title, 'nightRate'=> $request->nightRate, 'capacity'=> $request->capacity, 'childrenAllowed'=> $request->childrenAllowed, 'maxAdult'=> $request->maxAdult, 'description'=> $request->description]);
        return redirect()->back()
        ->with('title', $title);
    }
    public function familyPhoto(Request $request)
    {
      $this->validate($request, [
      'cover_images' => 'image|max:1999|required'
    ]);
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

      $title = 'Settings';
      DB::table('room_types')
        ->where('roomTypeID', '=', 3)
        ->update(['cover_image'=> $fileNameToStore]);
      return redirect()->back()
      ->with('title', $title);
    }

    public function barkada(Request $request)
    {
        $title = 'Settings';
        DB::table('room_types')
          ->where('roomTypeID', '=', 4)
          ->update(['title'=> $request->title, 'nightRate'=> $request->nightRate, 'capacity'=> $request->capacity, 'childrenAllowed'=> $request->childrenAllowed, 'maxAdult'=> $request->maxAdult, 'description'=> $request->description]);
        return redirect()->back()
        ->with('title', $title);
    }
    public function barkadaPhoto(Request $request)
    {
      $this->validate($request, [
      'cover_images' => 'image|max:1999|required'
    ]);
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

      $title = 'Settings';
      DB::table('room_types')
        ->where('roomTypeID', '=', 4)
        ->update(['cover_image'=> $fileNameToStore]);
      return redirect()->back()
      ->with('title', $title);
    }
}
