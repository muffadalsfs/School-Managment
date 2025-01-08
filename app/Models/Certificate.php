<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable =[
        'name','description','is_active'
    ];
    public function students()
{
    return $this->belongsToMany(Students::class, 'certificate_student'); // Ensure the pivot table

}
}