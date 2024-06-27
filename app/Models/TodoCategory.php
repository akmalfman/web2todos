<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoCategory extends Model
{
    use HasFactory;

    protected $table = 'todo_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'category'];
}
