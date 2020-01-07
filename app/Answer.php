<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'content' , 'user_id' , 'question_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
}
