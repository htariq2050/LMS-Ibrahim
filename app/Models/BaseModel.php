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


      public function createdBy()
      {
          return $this->belongsTo(User::class, 'created_by');
      }
  
      public function updatedBy()
      {
          return $this->belongsTo(User::class, 'updated_by');
      }
  
      public function deletedBy()
      {
          return $this->belongsTo(User::class, 'deleted_by');
      }
}
