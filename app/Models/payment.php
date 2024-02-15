<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $table = 'tb_payment';//SPECIFY TABLE
    protected $primaryKey = 'Payment_ID';

    public $timestamp=false;

    protected $fillable = [
        'MOP'
    ];

}
