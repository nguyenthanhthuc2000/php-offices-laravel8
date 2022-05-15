<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function info()
    {
        return $this->hasOne(Info::class);
    }

    public function facultyTeacher()
    {
        return $this->hasOne(FacultyTeacher::class, 'user_id', 'id');
    }

    public function scopeFilterEmail($query, $request)
    {
        if ($request->has('email') && $request->email != '') {
            $query->where('email', 'like' , '%'.$request->email.'%')->get();
        }
        return $query;
    }

    public function scopeClassStudent($query, $request)
    {
        if ($request->has('class_id') && $request->class_id != '') {
            $query->join('info', 'info.user_id', '=', 'users.id')
                ->where('info.class_id', $request->class_id)->get();
        }
        return $query;
    }

}
