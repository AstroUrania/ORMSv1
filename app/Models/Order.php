<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'tb_orders';//SPECIFY TABLE
    protected $primaryKey = 'Order_ID';
    use HasFactory;
    public $timestamp=false;

    protected $fillable = [
        'Customer_ID',
        'Menu_ID',
        'Quantity'
    ];
}
