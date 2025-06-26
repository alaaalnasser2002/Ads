<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offers extends Model
{
    use HasFactory;
public function ad() { return $this->belongsTo(Ad::class); 
}

public function company() { return $this->belongsTo(Company::class); 
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
protected $fillable = [
        'title',
        'description',
        'discount_percentage',
        'company_id',
        'user_id',
        'start_date',
        'end_date',
    ];

}
