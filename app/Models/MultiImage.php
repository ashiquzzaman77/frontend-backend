<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Project Section
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
