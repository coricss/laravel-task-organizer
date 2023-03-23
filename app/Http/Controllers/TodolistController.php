<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('main', compact('todos'));
    }

    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->save();
        return redirect()->back();
    }

    public function update_done(Request $request, Todo $todo)
    {

        $todo->update([
            'is_done' => $request->has('is_done') ? 1 : 0,
        ]);

        return redirect()->back();
    }

    public function update_title(Request $request, Todo $todo)
    {
        $todo->update([
            'title' => $request->title,
        ]);

        return redirect()->back();
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        return redirect()->back();
    }
}

