<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTeacher extends Model
{
    use HasFactory;
    protected $table = 'teacher_faculty';
    protected $guarded = [];
    public $timestamps = true;

    public function faculty()
    {
        return $this->hasOne(Faculty::class, 'id', 'faculty_id');
    }
}
