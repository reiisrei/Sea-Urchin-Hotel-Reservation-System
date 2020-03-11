<?php

namespace App\Http\Controllers;
use App\roomType;
use App\availableRoom;
use App\Advertisment;
use Illuminate\Http\Request;
use DB;

class RoomsController extends Controller
{
  //category admin side
    public function submit(Request $request){
      $this->validate($request, [
        'roomType' => 'required',
        'rateForNight' => 'required',
        //'availableRooms' => 'required',
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
      $roomType = new roomType;
      $roomType->title = $request->input('roomType');
      $roomType->nightRate = $request->input('rateForNight');
      //$roomType->availableRooms = $request->input('availableRooms');
      $roomType->allowedChildren = $request->input('allowedChildren');
      $roomType->maxAdult = $request->input('maxAdult');
      $roomType->description = $request->input('description');
      $roomType->cover_image = $fileNameToStore;
      // Save Message
      $roomType->save();

      $availableRoom = new availableRoom;

      // Redirect
      return redirect('/create')

      ->with('success', 'Room Saved');

    }

    //ads admin side
      public function Submit_advertisment(Request $request){
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
        $ad = new Advertisment;
        $ad->title = $request->input('title');
        $ad->intro = $request->input('intro');
        $ad->caption = $request->input('caption');
        $ad->description = $request->input('description');
        $ad->cover_image = $fileNameToStore;
        $ad->main_image = $fileNameToStores;
        // Save Message
        $ad->save();
        // Redirect
        return redirect('/create_advertisment')

        ->with('success', 'Advertisment Saved');

      }
  //  category admin side
      public function getCreate_advertisment(){
        $title = 'Admin - Create Advertisment';
        return view('admin.create_advertisment')->with('title', $title);
      }




}
