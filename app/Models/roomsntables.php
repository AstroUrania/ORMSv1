<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roomsntables extends Model
{
    use HasFactory;

    protected $table = 'tbroomsntables';//SPECIFY TABLE
    protected $primaryKey = 'RT_ID';
    public $timestamp=false;
}
