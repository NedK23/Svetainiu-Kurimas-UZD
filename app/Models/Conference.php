<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $fillable = ['title', 'description', 'date', 'location'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_conferences');
    }
}

