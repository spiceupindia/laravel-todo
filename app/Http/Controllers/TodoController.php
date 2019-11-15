<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Support\Facades\Session;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('todos.index')->with('todos',$todos);
    }

    public function create(){
        return view('todos.create');
    }

    public function store(Request $request){

        //dd($request->all());


        //validation
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required'
        ]);
        //store into database
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->content = $request->content;
        $todo->save();

        Session::flash('success', 'Todo Created Successfully');

        //return redirect back
        return redirect(route('Todos'));
    }

    public function show(Todo $todo){
        //Route-Model Binding
        //$todo = Todo::find($id);
        return view('todos.show')->with('todo',$todo);
    }

    public function edit(Todo $todo){
         //Route-Model Binding
        //$todo = Todo::find($id);
        return view('todos.edit')->with('todo',$todo);
    }

    public function update(Request $request,Todo $todo){

        //validate
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required'
        ]);

        //update the database
         //Route-Model Binding
        //$todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->content = $request->content;
        $todo->save();

        Session::flash('success', 'Todo Updated Successfully');
        //return redirect
        return redirect(route('Todos'));
    }

    public function delete(Todo $todo){
         //Route-Model Binding
        //$todo = Todo::find($id);
        $todo->delete();

        Session::flash('success', 'Todo Deleted Successfully');
        return redirect(route('Todos'));
    }

    public function finished(Todo $todo){
        $todo->finished = true;
        $todo->save();

        Session::flash('success', 'Todo Finished Successfully');
        return redirect(route('Todos'));
    }


}
