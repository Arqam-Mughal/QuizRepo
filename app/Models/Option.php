<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;

    public function questions(){
        // return $this->belongsTo(Question::class, 'question_id');
    }
}
