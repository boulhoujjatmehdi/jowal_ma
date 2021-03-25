<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cordinate extends Model
{
    use HasFactory;
    protected $fillable = ['lng' , 'lat' , 'user_id' , 'date'];
}
