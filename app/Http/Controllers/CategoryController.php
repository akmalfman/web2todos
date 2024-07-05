<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\TodoCategory;

class CategoryController extends Controller
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
        $categories = Todo::join('todo_categories', 'todo_categories.id', '=', 'todos.todo_category_id')
            ->join('users', 'users.id', '=', 'todos.user_id')
            ->select(
                'users.*',
                'todo_categories.*',
                'todo_categories.id as category_id',
                'todos.id as todo_id',
                'todos.todo_category_id',
                'todos.user_id',
                'todos.title',
                'todos.description',
            )
            ->get();
        // dd($todos);
        return view('category.category', compact('categories'));
    }
}
