<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = [
        "country_id",
        "job_id", 
        "experience_id", 
        "status_id", 
        "religion_id", 
        "photo", 
        "salary"
    ];

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function job() {
        return $this->belongsTo(Job::class);
    }

    public function experience() {
        return $this->belongsTo(Experience::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function religion() {
        return $this->belongsTo(Religion::class);
    }
}
