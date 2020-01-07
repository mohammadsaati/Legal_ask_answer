<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title' , 'content' , 'user_id' , 'cat_id'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
