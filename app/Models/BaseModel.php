<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
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
