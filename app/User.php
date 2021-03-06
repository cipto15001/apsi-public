<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function simulations()
    {
        return $this->belongsToMany(Simulation::class, 'simulation_histories');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function workspaces() {
        return $this->hasMany(Workspace::class, 'manager_id');
    }
}
