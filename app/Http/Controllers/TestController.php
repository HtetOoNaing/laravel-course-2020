<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{
    public function index() {
        $tests = Test::all();
        return view('hello',['tests' => $tests]);
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $test = Test::create($request->all());

        // $test = new Test;

        // $test->name = $request->name;

        // $test->save();

        return redirect()->route('index');
    }

    public function edit(Test $test) {
        return view('edit',['test' => $test]);
    }

    public function update(Test $test, Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $test->update($request->all());
        // $test->name = $request->name;
        // $test->save();
        return redirect()->route('index');
    }

    public function destroy(Test $test) {
        $test->delete();
        return redirect()->route('index');
    }
}
