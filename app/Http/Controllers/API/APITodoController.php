<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class APITodoController extends Controller
{
    public function index()
    {
        $todos = Todo::join('todo_categories', 'todo_categories.id', '=', 'todos.todo_category_id')
            ->join('users', 'users.id', '=', 'todos.user_id')
            ->select(
                'users.name',
                'users.email',
                'todo_categories.category',
                'todos.title',
                'todos.description',
            )
            ->get();
        $data = [
            "message" => "Success getAPI Todo",
            "time" => now(),
            "data" => $todos,
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $value = [
            'todo_category_id' => $request->todo_category_id,
            'user_id' => 1,
            'title' => $request->title,
            'description' => $request->description,
        ];

        Todo::create($value);

        $data = [
            "message" => "Success post Todo",
            "time" => now(),
            "data" => $value,
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {

        $value = [
            'todo_category_id' => $request->todo_category_id,
            'user_id' => 1,
            'title' => $request->title,
            'description' => $request->description,
        ];

        Todo::where('id', $id)->update($value);

        $data = [
            "message" => "Success Update Todo",
            "time" => now(),
            "data" => $value,
        ];

        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $todo = Todo::find($id);

        $todo->delete();

        $data = [
            "message" => "Success Delete Todo",
            "time" => now(),
            "data" => $todo,
        ];

        return response()->json($data, 200);
    }
}
