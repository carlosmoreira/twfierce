<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $fillable = ['notebookName', 'notebookContents', 'project_id'];

    public $timestamps = false;

    public function projects()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }
}
