<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schoolYear extends Model
{
    use HasFactory;
    protected $table = 'school_years';
    protected $guarded = [];
    public $timestamps = true;
}
