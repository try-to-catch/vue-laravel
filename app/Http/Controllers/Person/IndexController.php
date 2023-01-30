<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return Person::query()->select(['id', 'name', 'age', 'job'])->get();
    }
}
