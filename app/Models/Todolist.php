<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'todolists';
    protected $guarded = ['id'];
    protected $fillable = ['text', 'created_at'];
}
