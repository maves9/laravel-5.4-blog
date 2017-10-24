<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class UpdateUserImage extends Controller
{
  public function imgReset(Request $request, $id){
    $user = User::findOrFail($id);
    if($user->avatar !== 'default.jpg'){
      Storage::delete('public/avatar/'.$user->avatar);
      $user->avatar = 'default.jpg';
      $user->update($request->all());
      return redirect('/user'. '/' . $user->id)->with('success', 'User updatedddd');
    }else {
    return redirect('/user'. '/' . $user->id)->with('error', 'nothing to update');
    }
  }
}
