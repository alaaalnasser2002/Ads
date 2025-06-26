<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{
    use HasFactory;
    public function company() { return $this->belongsTo(Company::class);
    }
    
    public function user()
{
    return $this->belongsTo(User::class);
}
protected $fillable = [
        'plan',
        'start_date',
        'method',
        'end_date',
        'amount',
        'company_id',
        'user_id',
    ];

}
