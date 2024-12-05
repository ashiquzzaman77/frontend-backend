<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory,HasSlug;
    protected $slugSourceColumn = 'name';
    
    protected $guarded = [];
}
