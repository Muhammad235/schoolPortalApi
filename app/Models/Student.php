<?php

namespace App\Models;

use App\Models\StudentClass;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address',
        'gender',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $hidden = [
        'password'
    ];

    public function score(): HasOne
    {
        return $this->hasOne(SubjectScore::class, 'student_id');
    }

}
