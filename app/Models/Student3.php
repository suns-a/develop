<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student3 extends Model
{
    use HasFactory;

    protected $table = "student3s";

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function getStudents()
    {
        return Student3::all();
    }
}
