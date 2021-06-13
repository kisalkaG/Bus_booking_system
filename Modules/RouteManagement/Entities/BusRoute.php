<?php

namespace Modules\RouteManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusRoute extends Model
{
    protected $table = 'bus_routes';
    protected $fillable = ['bus_id', 'route_id', 'status'];
    public $timestamps = false;

    public function bus()
    {
        return $this->belongsTo('Modules\BusManagement\Entities\Bus', 'bus_id', 'id');
    }

    public function busSchedule()
    {
        return $this->belongsTo('Modules\ScheduleManagement\Entities\BusSchedule', 'route_id', 'id');

    }

}
