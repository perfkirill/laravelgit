<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;


    public function QuestionAnswers(){
        return $this->HasMany(Answer::class,"question_id","id")->orderByDesc("id");

    }
}
