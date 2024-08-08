<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementCard extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'icons'];

    protected $casts = [
        'icons' => 'json', // Cast icons attribute to JSON
    ];
}
