<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';

    protected $fillable = [
        'upordown', 'FK_user_id', 'FK_thread_id',
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
