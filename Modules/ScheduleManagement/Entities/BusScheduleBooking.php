<?php

namespace Modules\ScheduleManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusScheduleBooking extends Model
{
    protected $table = 'bus_schedule_bookings';
    protected $fillable = ['bus_seat_id','user_id','bus_schedule_id','seat_number','price','status'];

    public function busSchedule() {
        return $this->belongsTo('Modules\ScheduleManagement\Entities\BusSchedule','bus_schedule_id','id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function busSeat() {
        return $this->hasMany('Modules\BusManagement\Entities\BusSeat','id','bus_seat_id');
    }
}
