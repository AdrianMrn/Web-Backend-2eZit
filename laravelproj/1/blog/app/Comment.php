<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'deleted', 'text', 'FK_user_id', 'FK_thread_id',
    ];

    public function user()
    {
        return $this->belongsTo('UsersUse');
    }

    public function thread()
    {
        return $this->belongsTo('Thread');
    }
}
