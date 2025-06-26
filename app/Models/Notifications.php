<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    public function user() { 
        return $this->belongsTo(User::class); }
    

    public function notificationType() {
        
        return $this->belongsTo(NotificationType::class); }
    protected $fillable = [
        'title',
        'message',
        'is_read',
        'user_id',
        'notification_type_id',
    ];    
}

