<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    public function userType(){
        return $this->belongsTo(UserType::class);
    }
    public function followers()
{
    return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
}

public function following()
{
    return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
}
    public function company_followers()
    {
        return $this->belongsToMany(User::class, 'company_followers');
    }

    
public function companies() {
    return $this->belongsToMany(Company::class, 'company_user');
}
public function ads()
{
    return $this->hasMany(Ad::class);
}

public function offers()
{
    return $this->hasMany(Offer::class);
}

public function subscriptions()
{
    return $this->hasMany(Subscription::class);
}

public function roles()
{
    return $this->belongsToMany(Role::class);
}



public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function interactions()
    {
        return $this->hasMany(interactions::class);
    }

    public function ad_reports()
    {
        return $this->hasMany(AdReport::class);
    }
    

protected $fillable = [
    'name', 'email', 'password',
];






}
