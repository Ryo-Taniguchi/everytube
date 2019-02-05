<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['music_name','artist','genre','string','user_id'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
