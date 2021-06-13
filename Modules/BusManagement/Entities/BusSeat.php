<?php

namespace Modules\BusManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusSeat extends Model
{
    protected $table ='bus_seats';
    protected $fillable = ['bus_id','seat_number','price'];
    public $timestamps = false;

    public function bus() {
        return $this->belongsTo('Modules\BusManagement\Entities\Bus','bus_id','id');
    }

    public function busScheduleBooking() {
        return $this->belongsTo('Modules\ScheduleManagement\Entities\BusScheduleBooking','id','bus_seat_id');
    }

}
