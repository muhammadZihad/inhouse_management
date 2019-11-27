<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    //
    protected $fillable = [
        'name',
        'user_id',
        'date',
        'time_in',
        'time_out',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}