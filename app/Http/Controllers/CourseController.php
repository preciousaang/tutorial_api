<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessUserFactory;

class CourseController extends Controller
{

    public function create(){
        ProcessUserFactory::dispatch();
        return response()->json('Ok', 200);
    }
}
