<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country_id',
        'job_id',
        'experience_id',
        'status_id',
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function job(){  
        return $this->belongsTo(Job::class);
    }

    public function experience(){
        return $this->belongsTo(Experience::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
