<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    protected $table = 'todo_lists';
    protected $primaryKey = 'id';
    protected $fillable = ['todo_id', 'user_id', 'day', 'status', 'todo_date'];
}
