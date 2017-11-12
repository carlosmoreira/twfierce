<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['projectname','companyId'];

    public $timestamps = false;

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
