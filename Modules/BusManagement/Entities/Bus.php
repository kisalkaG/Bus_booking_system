<?php

namespace Modules\BusManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bus extends Model
{
    protected $table = 'buses';
    protected $fillable = ['id','name','type','vehical_number'];

    public function busSeat() {
        return $this->hasMany('Modules\BusManagement\Entities\BusSeat','bus_id','id');

    }

    public function busRoute() {
        return $this->hasMany('Modules\RouteManagement\Entities\BusRoute','route_id','id');
    }
}
