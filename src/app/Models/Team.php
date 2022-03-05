<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['team_name', 'admin_user_id'];

    // define relationships with users table
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'belong_to_teams', 'team_id', 'user_id');
    }
}
