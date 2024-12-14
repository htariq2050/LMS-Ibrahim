<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends BaseModel
{
     protected $table = 'purchases';

     protected $fillable = [
         'purchase_id',
         'course_id',
         'user_id',
         'purchase_date',
         'amount_paid',
         'payment_status',
     ];
 
 
     public function user()
     {
         return $this->belongsTo(User::class);
     }
 

     public function course()
     {
         return $this->belongsTo(Course::class);
     }
  
}
