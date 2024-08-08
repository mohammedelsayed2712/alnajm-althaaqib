<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;
    protected $fillble = [
        'name',
        'country_id',
        'job_id',
        'religion_id',
        'status_id',
        'experience_id',
        'price',
        'cv_url'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
