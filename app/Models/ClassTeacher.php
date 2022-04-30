<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTeacher extends Model
{
    use HasFactory;
    protected $table = 'class_teacher';
    protected $guarded = [];
    public $timestamps = true;
}
