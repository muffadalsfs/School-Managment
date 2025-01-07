<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'country',
        'student_id',
        'gender',
        'standard_id'
    ];
    public function standard(){
        return $this-> belongsTo(Standard::class);
    }
}
