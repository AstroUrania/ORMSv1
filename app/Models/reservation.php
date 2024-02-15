<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $table = 'tb_reservation';//SPECIFY TABLE
    protected $primaryKey = 'Reservation_ID';
    public $timestamp=false;
}
