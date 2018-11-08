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
    
    public function is_favored_by()
    {
        return $this->belongsToMany(User::class, 'favorites', 'phrase_id', 'user_id')->withTimestamps();
    }
}
