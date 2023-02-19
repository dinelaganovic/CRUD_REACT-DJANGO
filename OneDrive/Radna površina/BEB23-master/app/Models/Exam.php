<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable=[
        'težina','name','course_id'
    ];

   
    public function courses()
    {
        return $this->hasMany(Course::class, 'id', 'course_id','IdP');
    }
    
}
