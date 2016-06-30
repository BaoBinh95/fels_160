<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonWord extends Model
{
    protected $fillable = ['lesson_id', 'word_answer_id'];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }
    
    public function wordAnswer()
    {
        return $this->belongsTo(WordAnswer::class);
    }
}
