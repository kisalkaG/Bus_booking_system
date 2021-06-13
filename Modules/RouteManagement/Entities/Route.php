<?php

namespace Modules\RouteManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Route extends Model
{
    protected $table = 'routes';
    protected $fillable = ['node_one','node_two','route_number','distance','time'];
    public $timestamps = false;

    public function busRoute() {
        return $this->hasMany('Modules\RouteManagement\Entities\BusRoute','bus_route_id','id');
    }

    public function busShedule() {
        return $this->hasMany('Modules\ScheduleManagement\Entities\BusSchedule','bus_route_id','id');
    }


}
