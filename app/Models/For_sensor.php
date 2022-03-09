<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class For_sensor extends Model
{
    use HasFactory;




    public function Detail()
    {
        return $this->hasOne('App\Models\Sensor_detail' , 'sensor_id' , 'sens_id')->orderBy('id', 'DESC');
    }
}
