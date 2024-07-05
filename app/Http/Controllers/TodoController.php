<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\TodoCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $todos = DB::table('todos')
        //     ->join('todo_categories', 'todos.todo_category_id', '=', 'todo_categories.id')
        //     ->join('users', 'todos.user_id', '=', 'users.id')
        //     ->get();
        $todos = Todo::join('todo_categories', 'todo_categories.id', '=', 'todos.todo_category_id')
            ->join('users', 'users.id', '=', 'todos.user_id')
            ->select(
                'users.*',
                'todo_categories.*',
                'todos.id as todo_id',
                'todos.todo_category_id',
                'todos.user_id',
                'todos.title',
                'todos.description',
            )
            ->get();
        // dd($todos);
        return view('todo.todo', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $todocategories = TodoCategory::where('user_id', 1)->get();
        // dd($todocategories);
        return view('todo.create', compact('todocategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $value = [
            'todo_category_id' => $request->todo_category_id,
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description
        ];

        Todo::create($value);
        return redirect('todo');
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
        $todo = Todo::find($id);
        $todocategories = TodoCategory::all();
        // dd($todo);
        return view('todo.edit', compact('todo', 'todocategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $value = [
            'todo_category_id' => $request->todo_category_id,
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
        ];

        Todo::where('id', $id)->update($value);
        return redirect('todo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::find($id);

        $todo->delete();
        return redirect('todo');
    }
}
