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

}
