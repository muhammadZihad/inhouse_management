<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //

    protected $fillable = [
        'title', 'description', 'from_Date', 'to_Date', 'status', 'leader_id'
    ];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function days()
    {
        return $this->belongsToMany(Day::class);
    }
    public function hasUser($id)
    {
        return in_array($id, $this->users->pluck('id')->toArray());
    }
}