<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    public function roles(){
        return $this->belongsToMany(Role::class, 'user_role');
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            return $this->roles->pluck('name')->intersect($roles)->isNotEmpty();
        }

        return $this->roles->pluck('name')->contains($roles);
    }
    protected static function boot()
{
    parent::boot();

    static::deleting(function ($user) {
        $user->roles()->detach();
    });
}

}
