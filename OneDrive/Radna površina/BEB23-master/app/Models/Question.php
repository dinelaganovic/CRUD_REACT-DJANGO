<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'pitanje', 'odgovor', 'asocijacija','exam_id', 'status'
    ];

    
    public function exams()
    {
        return $this->hasMany(Question::class, 'id', 'exam_id');
    }
}
