<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersUse extends Model
{
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email',
    ];

    public function thread()
    {
        return $this->hasMany(Thread::class, 'FK_user_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'FK_user_id');
    }

    public function vote()
    {
        return $this->hasMany(Vote::class, 'FK_user_id');
    }
}
