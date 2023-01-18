<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumerLog extends Model
{
    protected $table = 'consumer_logs';

    protected $fillable = [
        'name',
        'room',
    ];
}
