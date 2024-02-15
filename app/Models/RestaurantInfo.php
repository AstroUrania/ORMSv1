<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantInfo extends Model
{
    use HasFactory;

    protected $table = 'tb_restaurantinfo';//SPECIFY TABLE
    //protected $primaryKey = 'id';
    public $timestamp=false;

    protected $fillable = [
        'DP',
        'Name',
        'Contact',
        'About',
    ];
}
