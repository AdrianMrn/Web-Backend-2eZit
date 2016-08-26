<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';

    protected $fillable = [
        'deleted', 'title', 'FK_user_id', 'url',
    ];

    public function user()
    {
        return $this->belongsTo('UsersUse');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'FK_thread_id');
    }

    public function vote()
    {
        return $this->hasMany(Vote::class, 'FK_thread_id');
    }
}
