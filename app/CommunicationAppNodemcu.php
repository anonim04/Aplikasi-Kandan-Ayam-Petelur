<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunicationAppNodemcu extends Model
{
    protected $fillable = [
        'device',
        'turn'
    ];
    public function historyDevices()
    {
        return $this->hasMany(HistoryDevice::class);
    }
}
