<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vedios extends Model
{
    use HasFactory;
    public function ad() {
        return $this->belongsTo(Ad::class);
    }
    protected $fillable=[
        'file_path',
        'file_type',
        'ad_id'
    ];
    

}
