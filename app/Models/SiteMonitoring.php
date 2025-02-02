<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteMonitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_url',
        'task_frequency',
        'user_id',
    ];

    // Define the relationship with SiteLog
    public function logs()
    {
        return $this->hasMany(SiteLog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
