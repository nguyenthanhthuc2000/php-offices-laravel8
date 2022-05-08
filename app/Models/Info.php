<?php

namespace App\Models;

use Database\Seeders\SchoolYearSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $table = 'info';
    protected $guarded = [];
    public $timestamps = true;

    public function placeBirth()
    {
        return $this->hasOne(Province::class, 'id', 'place_birth');
    }

    public function class()
    {
        return $this->hasOne(ClassList::class, 'id', 'class_id');
    }

    public function schoolYear()
    {
        return $this->hasOne(SchoolYear::class, 'id', 'school_year');
    }

    public function getEthnic()
    {
        return $this->hasOne(Ethnic::class, 'id', 'ethnic');
    }

    public function getDistrict()
    {
        return $this->hasOne(District::class, 'id', 'district');
    }

    public function getProvince()
    {
        return $this->hasOne(Province::class, 'id', 'province');
    }

    public function getWard()
    {
        return $this->hasOne(Ward::class, 'id', 'ward');
    }
}
