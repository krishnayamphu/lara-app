<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $todos=Todo::all();
        return view('todo.index',['todos'=>$todos]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|unique:todo|max:255'
        ]);
        $todo = new Todo();
        $todo->items = $request->input('items');
        $todo->save();
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todos =Todo::where('id', $id)->get();
        return view('todo.edit',['todos'=>$todos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todo = Todo::find($id);
        $todo->status=$request->status;
        if($todo->save()) {
            session()->flash('status', 'Todo  Updated');
        }
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::where('id',$id);
        if($todo->delete()){
            session()->flash('status', 'Item Deleted');
        }
        return redirect()->route('todo.index');
    }
}
