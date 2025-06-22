<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdTypes extends Model
{
    use HasFactory;
    

    protected $table = 'ad_types';

    public function ads()
    {
        return $this->hasMany(Ad::class, 'ad_type_id');
    }
    public function companies() {
        return $this->belongsToMany(Company::class, 'company_ad_type');}
}


