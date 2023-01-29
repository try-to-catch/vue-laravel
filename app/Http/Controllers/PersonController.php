<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __invoke(): array
    {
        $person = [
            ['id' => 1, 'name' => "Alex", 'age' => 32, 'job' => 'teacher'],
            ['id' => 2, 'name' => "John", 'age' => 26, 'job' => 'analytic'],
            ['id' => 3, 'name' => "Emma", 'age' => 21, 'job' => 'HR'],
            ['id' => 4, 'name' => "Neo", 'age' => 45, 'job' => 'none'],
        ];
        return $person;
    }
}
