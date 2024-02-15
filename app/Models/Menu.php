<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'tb_menu';//SPECIFY TABLE
    protected $primaryKey = 'Menu_ID';
    public $timestamp=false;

}

