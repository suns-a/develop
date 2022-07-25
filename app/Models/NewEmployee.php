<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewEmployee extends Model
{
    use HasFactory;

    protected $table = "new_employees";

    protected $fillable = ['name', 'email', 'phone', 'salary', 'department'];
}
