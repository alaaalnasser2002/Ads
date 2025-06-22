<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;


    public function adType()
    {
        return $this->belongsTo(AdType::class, 'ad_type_id');
    }
    public function images() {
        return $this->hasMany(Image::class);
    }
    public function videos() {
        return $this->hasMany(Video::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function interactions() {
        return $this->hasMany(Reaction::class);
    }
    public function ratings()   {
         return $this->hasMany(Rating::class); }

    public function saveds()  { return $this->hasMany(Saved::class); 
    
    }
    public function offers()    { return $this->hasMany(Offer::class);
     }

     public function user()
{
    return $this->belongsTo(User::class);
}

public function company()
{
    return $this->belongsTo(Company::class);
}

public function trending()
{
    return $this->hasOne(Trending::class, 'ad_id');
}



public function statistics()
{
    return $this->hasOne(\App\Models\AdStatistic::class, 'ad_id');
}


public function reports()
{
    return $this->hasMany(AdReport::class, 'ad_id');
}




    protected $table = 'ads';
    protected $fillable =['title','description','ad_type_id'];
}
