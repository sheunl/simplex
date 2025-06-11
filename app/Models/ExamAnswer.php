<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_question_id',
        'answer_text',
        'is_correct'
    ];
}
