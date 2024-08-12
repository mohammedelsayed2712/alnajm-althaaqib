<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentCountry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'image', 'price', 'phone_number', 'is_active'
    ];
}
