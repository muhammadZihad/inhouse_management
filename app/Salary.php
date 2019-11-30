<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    protected $fillable = [
        'name',
        'month_id',
        'amount_id',
        'status',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function amount()
    {
        return $this->belongsTo(Amount::class);
    }
    public function month()
    {
        return $this->belongsTo(Month::class);
    }
}