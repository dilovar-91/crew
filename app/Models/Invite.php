<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    public function user()
    {
    return $this->belongsTo(User::class, 'seamen_id');
    }
    public function inviter()
    {
    return $this->belongsTo(User::class, 'invited_by_id');
    }
    public function interview()
    {
    return $this->belongsTo(Interview::class);
    }
    public function question()
    {
    return $this->hasMany(Question::class, 'seamen_id');
    }
}
