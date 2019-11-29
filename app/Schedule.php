<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $fillable = [
        'title', 'description', 'from_Date', 'to_Date'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function days()
    {
        return $this->belongsToMany(Day::class);
    }
}