<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Sensor extends Model
{
    use HasFactory;



    public function sensorDetail()
    {
        return $this->hasMany('App\Models\Sensor_detail', 'sensor_id');
    }

    // public function Detail()
    // {
    //     return $this->belongsTo('App\Models\Sensor_detail', 'id','sensor_id');
    // }

    public function Sensorr()
    {
        return $this->belongsTo('App\Models\For_Sensor' , 'id', 'sens_id')->where('userID', Auth::user()->id)->where('tick', 1)->where('act', 'home');
    }

    public function UserSensor()
    {
        return $this->belongsTo('App\Models\User_senor' , 'id', 'sensor_id')->where('user_id', Auth::user()->id)->where('type', 'homee');
    }
    public function Alarm()
    {
        return $this->belongsTo('App\Models\Alarm_set' , 'id', 'sensor_id')->where('user_id', Auth::user()->id);
    }

}
