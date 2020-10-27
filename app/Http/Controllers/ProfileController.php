<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);

        return view('index', compact('profiles'));
    }

    public function show($id)
    {
        $profile = Profile::where('id', $id)->where('status', 1)->first();

        return view('show', compact('profile'));
    }


    public function create()
    {
        return view('profile');
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

    public function edit(Request $request)
    {
        $items = Profile::find($request->id);
        return view('edit', compact('items'));
    }

    public function update(Request $request)
    {
        $post = $request->all();

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $request->file('image')->store('/public/images');
            $data = ['user_id' => \Auth::id(), 'id' => $post['id'],  'title' => $post['title'], 'content' => $post['content'], 'image' => $request->file('image')->hashName()];
        } else {
            $data = ['user_id' => \Auth::id(), 'id' => $post['id'], 'title' => $post['title'], 'content' => $post['content']];
        }
        
        $items = Profile::find($request->id);
        $items->fill($data)->save();
        
        return redirect('/')->with('flash_message', '編集が完了しました');
    }

    public function delete(Request $request)
    {   
        $items = Profile::find($request->id);
        // dd($items);
        return view('del', compact('items'));
    }

    public function remove(Request $request)
    {   
        Profile::find($request->id)->delete();     
        return redirect('/')->with('flash_message', '削除しました');
    }

}
