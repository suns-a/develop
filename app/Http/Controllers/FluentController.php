<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FluentController extends Controller
{
    public function index()
    {
        echo '<h1>Fluent Strings</h1>';

        $slice = Str::of('Welcome to my page')->after('Welcome to');
        echo $slice . '<br>';

        $slice2 = Str::of('App\Http\Controllers\Controller')->afterLast('\\');
        echo $slice2 . '<br>';

        $string = Str::of('Hello')->append('World');
        echo $string . '<br>';

        $result = Str::of('LARAVEL')->lower();
        echo $result . '<br>';

        $replaced = Str::of('Laravel 7')->replace('7', '8');
        echo $replaced . '<br>';

        $converted = Str::of('this is a title')->title();
        echo $converted . '<br>';

        $slug = Str::of('Laravel 8 framework')->slug('-');
        echo $slug . '<br>';

        $str = Str::of('Laravel framework')->substr(8, 5);
        echo $str . '<br>';

        $str2 = Str::of('/Laravel/')->trim('/');
        echo $str2 . '<br>';

        $str3 = Str::of('laravel')->upper();
        echo $str3 . '<br>';
    }
}
