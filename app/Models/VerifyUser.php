<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    use HasFactory;

    public $table = "verify_users";

    protected $fillable = [
        'Customer_ID',
        'token',
    ];

        public function user(){
            return $this->belongsto(User::class);
        }
}

    