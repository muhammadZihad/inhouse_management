<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    //
    protected $fillable = ['amount'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}