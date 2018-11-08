<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    protected $dates = ['deleted_at'];
    
    public function phrases()
    {
        return $this->hasMany(Phrase::class);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Phrase::class, 'favorites', 'user_id', 'phrase_id')->withTimestamps();
    }
    
    public function favor($phraseId)
    {
        // 既にお気に入りに登録しているかの確認
        $exist = $this->is_favoring($phraseId);
        
        if ($exist) {
            // 既にお気に入りに登録していれば何もしない
            return false;
        } else {
            // まだお気に入りに登録していなければ登録する
            $this->favorites()->attach($phraseId);
            return true;
        }
    }
    
    public function unfavor($phraseId)
    {
        // 既にお気に入りに登録しているかの確認
        $exist = $this->is_favoring($phraseId);
        
        if ($exist) {
            // 既にお気に入りに登録していれば外す
            $this->favorites()->detach($phraseId);
            return true;
        } else {
            // まだお気に入りに登録していなければ何もしない
            return false;
        }
    }
    
    public function is_favoring($phraseId) {
        return $this->favorites()->where('phrase_id', $phraseId)->exists();
    }
}
