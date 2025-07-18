<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interactions extends Model
{
    use HasFactory;
    public function ad() {
        return $this->belongsTo(Ad::class);
    }

    

public function user() {
    return $this->belongsTo(User::class); } 
    protected $fillable = [
        'interaction_type',
        'user_id',
        'ad_id',
    ];

}
