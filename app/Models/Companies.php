<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    public function adTypes() {
        return $this->belongsToMany(AdType::class, 'company_ad_type');
    }
    public function users() {
        return $this->belongsToMany(User::class, 'company_user');

    }
    public function ads()
{
    return $this->hasMany(Ad::class);
}

public function subscription()
{
    return $this->hasOne(Subscription::class);
}

public function followers()
{
    return $this->belongsToMany(User::class, 'company_followers');
}
protected $fillable = [
        'name',
        'email',
        'inf_communication',
        'logo_url',
        'website_url',
        'description',
    ];


}
