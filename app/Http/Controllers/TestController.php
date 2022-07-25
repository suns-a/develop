<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student2;
use App\Models\Post2;

class TestController extends Controller
{
    public function addStudent()
    {
        $students = [
            ['name'=>'smith','email'=>'smith@gmail.com','phone'=>'1234567890'],
            ['name'=>'jennifer','email'=>'jennifer@gmail.com','phone'=>'1234567890']
        ];
        Student2::insert($students);
        return "Students are added";
    }

    public function addPost()
    {
        $posts = [
            ['title'=>'first post title','body'=>'first post description'],
            ['title'=>'second post title','body'=>'second post description']
        ];
        Post2::insert($posts);
        return "Posts are created";
    }

    public function getStudents()
    {
        $students = Student2::all();
        return $students;
    }

    public function getPosts()
    {
        $posts = Post2::all();
        return $posts;
    }
}
