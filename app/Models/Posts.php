<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'idpost';
    protected $fillable = [
        'title',
        'content',
        'date',
        'username',
    ];
    public $timestamps = false;
}
