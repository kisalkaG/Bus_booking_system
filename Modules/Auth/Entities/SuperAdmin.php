<?php

namespace Modules\Auth\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SuperAdmin extends Authenticatable
{
    use HasApiTokens, Notifiable;



    protected $table = 'super_admin';
    protected $fillable = [];


}
