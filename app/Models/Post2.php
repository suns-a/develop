<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post2 extends Model
{
    use HasFactory;

    protected $connection = "mysql2";

    protected $table = "post2s";
}
