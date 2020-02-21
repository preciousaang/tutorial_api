<?php

namespace App\Exports;

use App\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportCourses implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Course::all();
    }

    public function headings(): array{
        return [
            '#',
            'title',
            'price',
            'created_at',
            'updated_at'
        ];
    }
}
