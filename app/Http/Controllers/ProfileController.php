<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
use DB;
use Image;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth', ['except' => ['show']]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $user = User::findOrFail($id);
    return view('user.show', compact('user'));
  }

  public function index()
  {

  //return view('user.profile')->withUser($user);
  }

  public function edit($id){
    $user = User::findOrFail($id);
    return view('user.edit', compact('user'));
  }

  public function update(Request $request, $id){

    $user = User::findOrFail($id);
    
    $this->validate($request, [
      'avatar' => 'image|max:1999',
    ]);

    // Handle Upload
    if($request->hasFile('avatar')){

        $file = $request->file('avatar');
        // Get filename with the extension
        $filenameWithExt = $file->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('avatar')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        Image::make($file)->resize(200, 200);
        // Upload Image
        $path = $request->file('avatar')->storeAs('public/avatar', $fileNameToStore);

    } elseif ( $request->file('avatar') === false) {

      $fileNameToStore = 'default.jpg';
    }

    else {
        $fileNameToStore = 'default.jpg';

    }

    if ($request->has('name') || $request->has('email') || $request->has('bio') ) {
      $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'bio' => 'string|max:2000',
    ]);

    }
    // Create user
    if($request->hasFile('avatar')){
        $user->avatar = $fileNameToStore;
    }
    $user->avatar = $fileNameToStore;
    $user->update($request->all());

    return redirect('/user'. '/' . $user->id)->with('success', 'User updated');
    }

    public function destroy($id){

      $user = User::find($id);

      // Check for correct user
      if(auth()->user()->id !== $user->id){
          return redirect('/user'. '/' . $user->id)->with('error', 'Unauthorized Page');
      }

      if($user->avatar != 'default.jpg'){
          // Delete Image
          Storage::delete('public/avatar/'.$user->avatar);
      }

      $user->delete();
      return redirect('/')->with('success', 'User removed');

    }

}
