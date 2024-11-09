<?php

namespace App\Traits;
use Illuminate\Database\Schema\Blueprint;

trait CommonColumns
{
    public function addCommonColumns(Blueprint $table): void
    {
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamps();  
        $table->unsignedBigInteger('created_by')->nullable();
        $table->unsignedBigInteger('updated_by')->nullable();
        $table->softDeletes();  
        $table->unsignedBigInteger('deleted_by')->nullable();
    }
}
