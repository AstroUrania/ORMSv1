<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guests extends Model
{
    use HasFactory;
    public $table = 'tb_guests';//SPECIFY TABLE

    protected $primaryKey = 'id';

}
