<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FlashCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'front_content',
        'back_content',
        'user_id',
        'topic_id'
    ];
}
