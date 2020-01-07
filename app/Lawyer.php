<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    protected $fillable = [
        'educated' , 'lawyerCode' , 'lawPlace' , 'skill' , 'user_id' , 'avatar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
