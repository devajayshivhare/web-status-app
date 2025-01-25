<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteMonitoring extends Model
{
    protected $fillable = [
        'site_url',
        'task_frequency',
    ];
}
