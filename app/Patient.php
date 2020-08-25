<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_of_birth' => 'date',
    ];
}
