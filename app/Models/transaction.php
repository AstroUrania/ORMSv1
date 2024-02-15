<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $table = 'tb_transaction';//SPECIFY TABLE
    protected $primaryKey = 'Transaction_ID';
    public $timestamp=false;
}
