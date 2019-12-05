<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $fillable = [
        'user_id',
        'status',
        'req_date',
        'msg',
        'app_date',
        'arrover_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}