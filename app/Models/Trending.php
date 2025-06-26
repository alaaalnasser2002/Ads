<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trending extends Model
{
    use HasFactory;
    
    public function ad()
    {
        return $this->belongsTo(Ad::class, 'ad_id');
    }
    protected $fillable=[
        'views_count',
        'ad_id'
    ];

}
