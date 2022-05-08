<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table = 'ward';
    protected $guarded = [];

    public function ward(){
        return $this->hasMany(Ward::class, '_district_id', 'id');
    }
}
