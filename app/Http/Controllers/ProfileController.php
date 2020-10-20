<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::where('status', 1)->orderBy('created_at', 'DESC')->paginate(9);

        return view('index', compact('profiles'));
    }

    public function show($id)
    {
        $profile = Profile::where('id', $id)->where('status', 1)->first();

        return view('show', compact('profile'));
    }


    public function create()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $post = $request->all();

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $request->file('image')->store('/public/images');
            $data = ['user_id' => \Auth::id(), 'title' => $post['title'], 'content' => $post['content'], 'image' => $request->file('image')->hashName()];
        } else {
            $data = ['user_id' => \Auth::id(), 'title' => $post['title'], 'content' => $post['content']];
        }
        
        Profile::insert($data);

        return redirect('/')->with('flash_message', '投稿が完了しました');
    }
}