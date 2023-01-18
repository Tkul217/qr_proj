<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consumers extends Model
{
    protected $table = 'consumers';

    protected $fillable = [
        'name',
        'lastname',
        'company',
    ];
}
