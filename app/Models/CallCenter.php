<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallCenter extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'name',
        'icon1',
        'icon2',
    ];
}