<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassList extends Model
{
    use HasFactory;
    protected $table = 'class_list';
    protected $guarded = [];
    public $timestamps = true;

    public function faculty()
    {
        return $this->hasOne(Faculty::class, 'id', 'faculty_id');
    }
}
