<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    /** @use HasFactory<\Database\Factories\GuardianFactory> */
    use HasFactory;
    protected $fillable=[
        'name','contact_number','relationship_type'
    ];
      public function students()
    {
        return $this->belongsToMany(Students::class, 'guardian_student');
    }
}
