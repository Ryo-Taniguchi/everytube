<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'filename',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function videos() {
        return $this->hasMany(Video::class);
    }
    
    public function favorites() {
        return $this->belongsToMany(Video::class, 'favorites','user_id', 'video_id')->withTimestamps();
    }
    
    public function followings() {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    
    public function favorite($videoId) {
        $exist = $this->is_favorites($videoId);
        
        if ($exist) {
            return false;
        } else {
            $this->favorites()->attach($videoId);
            return true;
        }
    }
    
    public function unfavorite($videoId) {
        $exist = $this->is_favorites($videoId);
        
        if ($exist) {
            $this->favorites()->detach($videoId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_favorites($videoId) {
        return $this->favorites()->where('video_id',$videoId)->exists();
    }
    
    public function follow($userId) {
        $exist = $this->is_following($userId);
        
        $its_me = $this->id == $userId;
        
        if ($exist || $its_me) {
            return false;
        } else {
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId) {
        $exist = $this->is_following($userId);
        
        $its_me = $this->id == $userId;
        
        if ($exist && !$its_me) {
            $this->followings()->detach($userId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_following($userId) {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
}
