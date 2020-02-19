<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\CreateCourse;

class CourseController extends Controller
{

    public function create(){
        CreateCourse::dispatch();
        return response()->json('Ok', 200);
    }
}
