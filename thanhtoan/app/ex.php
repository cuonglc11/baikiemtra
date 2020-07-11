<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ex extends Model
{
protected $table = 'exes';
    protected $fillable = ['email', 'price'];
    public  $timestamps = false;    
}
