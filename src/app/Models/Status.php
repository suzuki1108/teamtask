<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['status_name', 'team_id', 'sort'];

    public function team()
    {
        return $this->hasOne('App\Models\Team', 'id', 'team_id');
    }
}
