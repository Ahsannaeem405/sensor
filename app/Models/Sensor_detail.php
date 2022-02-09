<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor_detail extends Model
{
    use HasFactory;

    public function sensor()
    {
        return $this->belongsTo('App\Models\Sensor', 'sensor_id');
    }
}
