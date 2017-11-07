<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'l_name', 'f_name', 'pat_name','iin',
        'position', 'phone', 'email', 'area_id'
    ];

   public function area()
    {
        return $this->belongsTo('App\Area');
    }
}
