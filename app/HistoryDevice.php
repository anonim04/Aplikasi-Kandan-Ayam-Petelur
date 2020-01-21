<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryDevice extends Model
{
    protected $fillable = [
        'user_id', 'communication_app_nodemcus_id'
    ];
}
