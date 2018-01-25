<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    protected $fillable = ['user_id', 'japanese', 'english'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
