<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $query = $request->input('query');

        $this->validate($request, [
            'query' => 'required',
          ]);

        $users = DB::table("users")
            ->where('name', 'like', "%{$query}%")
            ->get();

        $posts = Post::where(DB::raw("CONCAT(title)"), 'LIKE', "%{$query}%")
            ->get();

        return view('search.results')
        ->with('user', $users)
        ->with('post', $posts);
    }
}