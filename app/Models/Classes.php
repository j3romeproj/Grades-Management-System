<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'class';

    protected $primaryKey = 'class_id';

    protected $fillable = [
        'course_id',
        'faculty_id',
        'student_id',
        'description',
        'acadYear',
        'finalGrade',
        'gradeStatus'
    ];
}
