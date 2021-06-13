<?php

namespace Modules\ScheduleManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusSchedule extends Model
{
    protected $table = 'bus_schedules';
    protected $fillable = ['bus_route_id','direction','start_timestamp','end_timestamp'];
    public $timestamps = false;

    public function busScheduleBooking() {
        return $this->belongsTo('Modules\ScheduleManagement\Entities\BusScheduleBooking','bus_schedule_id','id');
    }

    public function busroute() {
        return $this->hasOne('Modules\RouteManagement\Entities\BusRoute','id','bus_schedule_id');
    }






}
