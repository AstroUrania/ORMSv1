<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $table = 'tb_menucategory';//SPECIFY TABLE
    protected $primaryKey = 'MenuCategory_ID';
    use HasFactory;
    public $timestamp=false;

    protected $fillable = [
        ''
    ];
}
 