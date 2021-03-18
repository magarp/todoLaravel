<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'name' => 'required',
        ]);
        $todoList = TodoList::create($validatedData);
        return response()->json(["data" => ["status"=>200, "message"=>"Todolist created", 'todoList' => $todoList]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodoList $todoList)
    {

      $validatedData = $request->validate([
        'name' => 'required',
      ]);
      TodoList::where('id',$todoList->id)->update($validatedData);
      return response()->json(["data" => ["status"=>200, "message"=>"Todolist updated", 'todoList' => TodoList::find($todoList->id)]]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $todoList)
    {
        $todoList->delete();
        return response()->json(["data" => ["status"=>200, "message"=>"TodoList deleted."]]);
    }
}
