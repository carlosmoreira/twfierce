<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    protected $table = "projectfiles";

    protected $primaryKey = "projectfileId";

    public function project()
    {
        return $this->belongsTo('App\Project', 'projectId');
    }

    public function projectFileVersion()
    {
        return $this->hasMany('App\ProjectFileVersion', "projectfileId");
    }

    public function getFileNameAttribute(){
        if($file = $this->projectFileVersion->first())
            return $file->projectfileversionFile;
        return "";
    }

}
