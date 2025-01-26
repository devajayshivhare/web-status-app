<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_monitoring_id',
        'status',
        'checked_at',
    ];

     // Define the inverse relationship with SiteMonitoring
     public function siteMonitoring()
     {
         return $this->belongsTo(SiteMonitoring::class);
     }
}
