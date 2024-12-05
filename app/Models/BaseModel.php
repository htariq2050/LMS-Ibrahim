<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use Filterable;

    protected $fillable = [
        'status', 
        'created_at', 
        'updated_at', 
        'created_by', 
        'updated_by', 
        'deleted_at', 
        'deleted_by'
    ];
}
