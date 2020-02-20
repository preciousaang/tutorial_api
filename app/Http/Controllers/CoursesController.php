<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Jobs\CreateCourse;
use Excel;
use App\Exports\ExportCourses;

class CoursesController extends Controller
{

    public function create(){
        CreateCourse::dispatch();
        return response()->json('Ok', 200);
    }

    public function register(Request $request){
        $user = auth('api')->user();
        $course = Course::findOrFail($request->course);
        if(!$course->users()->find($user->id)){
            $course->users()->attach($user->id);
            return response()->json(['message'=>'Ok'], 200);
        }else{
            return response()->json(['message'=>'User already registered'], 403);
        }
    }

    public function list(){
        $courses = collect(Course::all())->map(function($course){
            $user = auth('api')->user();
            $data = [];
            $data["name"] = strtoupper($course->name);
            $data["created_at"] = $course->created_at;
            if($course->users()->find($user->id)){
                $data["date_enrolled"] = $course->users()->find($user->id)->pivot->created_at;
            }
            return $data;
        });

        return response()->json($courses, 200);
    }

    public function export(){
        return Excel::download(new ExportCourses, 'courses.xlsx');
    }
}
