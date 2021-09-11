<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded =[];
    
    public function details(){
    	return $this->hasMany(BillDetails::class,'invoice_id','id');
    }
}
