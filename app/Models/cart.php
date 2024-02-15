<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    public $table = 'tb_cart';//SPECIFY TABLE

    protected $primaryKey = 'Cart_ID';

    protected $fillable = [
        'Customer_ID',
        'Menu_ID',
        'Quantity'
    ];
}
