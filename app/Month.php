<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    //
    protected $fillable = ['name'];
    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}