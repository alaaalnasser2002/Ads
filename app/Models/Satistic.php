<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satistic extends Model
{
    use HasFactory;

public function ad()
{
    return $this->belongsTo(\App\Models\Ad::class, 'ad_id');
}
protected $fillable = [
        'ad_id',
        'views',
        'clicks',
        'earnings',
        'conversion_rate',
    ];

}
