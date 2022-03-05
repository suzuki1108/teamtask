<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // define relationships with statuses table
    public function status()
    {
        $this->hasOne('App\Models\Status', 'id', 'status_id');
    }

    // define relationships with users table
    public function pic_user()
    {
        $this->hasOne('App\Models\User', 'id', 'pic_user_id');
    }

    // define relationships with users table
    public function create_user()
    {
        $this->hasOne('App\Models\User', 'id', 'create_user_id');
    }

    // define relationships with teams table
    public function team()
    {
        $this->hasOne('App\Models\Team', 'id', 'team_id');
    }
}
