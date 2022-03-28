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
    public function sensorDetail2()
    {
        return $this->hasOne('App\Models\Sensor_detail', 'sensor_id')->latest();
    }
    public function sensorDetail3()
    {
        return $this->hasMany('App\Models\Sensor_detail', 'sensor_id')->orderBy('id', 'DESC')->take(5);
    }

    // public function Detail()
    // {
    //     return $this->belongsTo('App\Models\Sensor_detail', 'id','sensor_id');
    // }

    public function Sensorr()
    {
        return $this->belongsTo('App\Models\For_Sensor' , 'id', 'sens_id')->where('userID', Auth::user()->id)->where('tick', 1)->where('act', 'home');
    }

    public function Sensorr_chart()
    {
        return $this->belongsTo('App\Models\For_Sensor' , 'id', 'sens_id')->where('userID', Auth::user()->id)->where('tick', 1)->where('act', 'chart');
    }

    public function Sensorr2()
    {
        return $this->belongsTo('App\Models\For_Sensor' , 'id', 'sens_id')->where('userID', Auth::user()->id)->where('act','disable');
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
