<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdReport extends Model
{
    use HasFactory;
    public function ad()
{
    return $this->belongsTo(Ad::class, 'ad_id');
}
public function user()
{
    return $this->belongsTo(User::class);
}
protected $fillable=[
    'user_id',
    'ad_id',
    'reason' 
];

}
