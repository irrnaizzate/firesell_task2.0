<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todos;

class TodoListController extends Controller
{
    public function index()
    {
        $todo = Todos::all();
        return response()->json($todo);
    }

    public function store(Request $request)
    {
        $todo = new Todos([
            'message' => $request->post('message'),
            'is_complete' => $request->post('is_complete'),
            'user_id' => $request->post('user_id'),
        ]);
        $todo->save();

        return response()->json('Successfully added!');
    }

    public function show($id)
    {
        $todo = Todos::find($id);
        return response()->json($todo);
    }

    // public function edit($id)
    // {
    //     $todo = Todos::find($id);
    //     return response()->json($todo);
    // }

    public function update(Request $request, $id)
    {
        $todo = Todos::find($id);
        $todo->message = $request->post('message');
        $todo->is_complete = $request->post('is_complete');
        $todo->user_id = $request->post('user_id');
        $todo->save();

        return response()->json('Successfully updated!');
    }

    public function destroy($id)
    {
        $todo = Todos::find($id);
        $todo->delete();

        return response()->json('Successfully deleted!');
    }
}
