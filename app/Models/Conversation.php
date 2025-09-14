<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function users() {
        return $this->hasMany(User::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    
}
