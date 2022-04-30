<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ethnic extends Model
{
    use HasFactory;
    protected $table = 'ethnic';
    protected $guarded = [];
    public $timestamps = true;
}
