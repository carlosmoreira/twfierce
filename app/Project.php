<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public function notebook()
    {
        return $this->hasMany('App\Notebook');
    }

    public function projectfile(){
        return $this->hasMany('App\ProjectFile', "projectId");
    }

    public function getTotalFilesAttribute(){
        return $this->projectfile->count();
    }
}
