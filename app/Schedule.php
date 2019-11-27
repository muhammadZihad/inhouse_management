<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $fillable = [
        'name',
        'user_id',
        'start_time',
        'end_time',
        'from',
        'to'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function days()
    {
        return $this->belongsToMany(Day::class);
    }
}