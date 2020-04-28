<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    public function invite()
    {
    return $this->hasMany(Invite::class);
    }
    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function questions()
    {
    return $this->hasMany(Question::class);
    }
}
