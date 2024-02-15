<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promo extends Model
{

    protected $table = 'tb_promo';//SPECIFY TABLE
    protected $primaryKey = 'Promo_ID';
    use HasFactory;
    public $timestamp=false;

    protected $fillable = [
        'Promo_ID',
        'Promo_Code',
        'Quantity'
    ];
}

