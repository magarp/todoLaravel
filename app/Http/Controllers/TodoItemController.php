<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use App\Models\TodoList;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTodoItemRequest;
use App\Http\Requests\UpdateTodoItemRequest;

class TodoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CreateTodoItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTodoItemRequest $request)
    {
      $todoList = TodoList::find($request->todo_list_id);
      if(!$todoList) return response()->json(["data" => ["status"=>404, "message"=>"TodoList not found."]]);

      $todoItem = TodoItem::create($request->only('description','due_date','todo_list_id'));
      return response()->json(["data" => ["status"=>200, "message"=>"TodoItem created", 'todoItem' => $todoItem]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateTodoItemRequest  $request
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoItemRequest $request, TodoItem $todoItem)
    {

      TodoItem::where('id',$todoItem->id)->update($request->only('description','due_date','is_completed'));
      return response()->json(["data" => ["status"=>200, "message"=>"TodoItem updated", 'todoItem' => TodoItem::find($todoItem->id)]]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoItem $todoItem)
    {
        $todoItem->delete();
        return response()->json(["data" => ["status"=>200, "message"=>"TodoItem deleted."]]);

    }
}
