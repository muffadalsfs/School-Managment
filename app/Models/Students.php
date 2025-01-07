<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'name',
        'address',
        'country',
        'student_id',
        'gender',
    ];
}
