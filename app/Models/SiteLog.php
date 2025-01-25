<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteLog extends Model
{
    protected $fillable = [
        'site_monitoring_id',
        'status',
        'checked_at',
    ];
}
