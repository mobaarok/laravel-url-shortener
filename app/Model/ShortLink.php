<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    protected $fillable = [
        'code', 'link'
    ];
}
