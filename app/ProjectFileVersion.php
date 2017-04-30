<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectFileVersion extends Model
{
    protected $table = "projectfileversions";
    protected $primaryKey = "projectFileVersionId";

    public function projectFile()
    {
        return $this->belongsTo('App\ProjectFile', "projectfileId");
    }
}
