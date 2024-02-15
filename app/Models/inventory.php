<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;

    protected $table = 'tb_inventory';//SPECIFY TABLE
    protected $primaryKey = 'Inventory_ID';
    public $timestamp=false;
}
