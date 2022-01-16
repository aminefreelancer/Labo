<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labo extends Model
{
    use HasFactory;

    protected $fillable = ['header', 'title', 'maps', 'phone', 'address', 'indication', 'mobile', 'email'];
}
