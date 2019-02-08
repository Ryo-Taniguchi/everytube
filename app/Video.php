<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['music_name','artist','genre','string','user_id'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function favorites_users() {
        return $this->belongsToMany(User::class, 'favorites', 'video_id','user_id')->withTimestamps();
    }
}
