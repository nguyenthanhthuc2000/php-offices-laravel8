<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    use HasFactory;
    protected $table = 'relative';
    protected $guarded = [];
    public $timestamps = true;

    public function getEthnic()
    {
        return $this->hasOne(Ethnic::class, 'id', 'ethnic');
    }
}
