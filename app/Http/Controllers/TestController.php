<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $tests = Test::all();
        return view('hello',['tests' => $tests]);
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        // ]);

        // dd($request->hasFile('profile'))
        $data = $request->all();
        if($request->hasFile('profile')) {
            $profile = $request->profile->store('images','public');
            // dd($profile);
            $data['profile'] = $profile;
        }
        
        if($request->hasFile('photos')) {
            $store_path = "";
            foreach($request->photos as $img) {
                $path = $img->store('images','public');
                $store_path .= $store_path ? ','.$path : $path;
            }
            $data['photos'] = $store_path;
        }
        $test = Test::create($data);
        return redirect()->route('index');
    }

    public function edit(Test $test) {
        return view('edit',['test' => $test]);
    }

    public function update(Test $test, Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $data = $request->all();
        if($request->hasFile('profile')) {
            $profile = $request->profile->store('images','public');
            // dd($profile);
            $data['profile'] = $profile;
        } else {
            $data['profile'] = $test->profile;
        }
        // dd($data);
        $test->update($data);
        // $test->name = $request->name;
        // $test->save();
        return redirect()->route('index');
    }

    public function destroy(Test $test) {
        $test->delete();
        return redirect()->route('index');
    }
}
