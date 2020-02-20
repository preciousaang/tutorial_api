<?php

namespace App\Exports;

use App\Course;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportCourses implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Course::all();
    }
}
