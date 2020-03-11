<?php

namespace App\Http\Controllers;
use App\Advertisment;
use Illuminate\Http\Request;

class ManageAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ads = Advertisment::orderBy('created_at', 'asc')->paginate(5);
      $title = 'Admin - Advertisments';
      // $rooms = Room::all();
      //$rooms = Room::orderBy('created_at', 'asc')->get();
      return view('admin.ads')
      ->with('title', $title)
      ->with('ads', $ads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_advertisment()
    {
      $title = 'Admin - Create Advertisment';
      return view('admin.create_advertisment')->with('title', $title);
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
      $ads =  Advertisment::find($id);
      $title = 'Admin - Edit Advertisment';
      return view('admin.edit-ads')
      ->with('title', $title)
      ->with('ads', $ads);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ads =  Advertisment::find($id);
      $title = 'Admin - Edit Advertisment';
      return view('admin.edit-ads')
      ->with('title', $title)
      ->with('ads', $ads);
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
        'title' => 'required',
        'intro' => 'required',
        'caption' => 'required',
        'description' => 'required',
        'cover_image' => 'image|nullable|max:1999',
        'main_image' => 'image|nullable|max:1999'
      ]);
      //file upload cover image
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

      //file upload main image
      if ($request->hasFile('main_image')) {
        //Get filename with the extesion
        $filenameWithExts = $request->file('main_image')->getClientOriginalName();
        //Get just the filename
        $filenames = pathinfo($filenameWithExts, PATHINFO_FILENAME);
        //Get just ext
        $extensions = $request->file('main_image')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStores = $filenames.'_'.time().'.'.$extensions;
        //Upload image
        $paths = $request->file('main_image')->storeAs('public/main_images',$fileNameToStores);
      }else {
        $fileNameToStores = 'noimage.jpg';
      }

      // Create New Room Category
      $ad = Advertisment::find($id);
      $ad->title = $request->input('title');
      $ad->intro = $request->input('intro');
      $ad->caption = $request->input('caption');
      $ad->description = $request->input('description');
      $ad->cover_image = $fileNameToStore;
      $ad->main_image = $fileNameToStores;
      // Save Message
      $ad->save();

      // Redirect
      $title = 'Admin - Edit Advertisment';
      return redirect()->back()
      ->with('title', $title)
      ->with('ad', $ad)
      ->with('success', 'Advertisment Updated');

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
