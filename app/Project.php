<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function notebook()
    {
        return $this->hasMany('App\Notebook');
    }
}
