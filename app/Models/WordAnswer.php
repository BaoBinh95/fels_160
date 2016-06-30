<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordAnswer extends Model
{
    protected $fillable = ['content', 'word_id', 'correct'];

    public function lessonWords()
    {
        return $this->hasMany(LessonWord::class);
    }

    public function word()
    {
        return $this->belongsTo(Word::class);
    }
}
