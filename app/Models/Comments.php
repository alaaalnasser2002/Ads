<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    public function ad() {
        return $this->belongsTo(Ad::class);
    }
    public function user() {
        return $this->belongsTo(User::class); }  
    public function replies()
    {
        return $this->hasMany(Reply::class);
        }
        protected $fillable = [
        'comment',
        'user_id',
        'ad_id',
    ];
}

    