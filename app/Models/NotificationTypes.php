<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationTypes extends Model
{
    use HasFactory;
    public function notifications()
{
    return $this->hasMany(Notification::class);
}
protected $fillable = [
    'name'
    ];

}
