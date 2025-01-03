<?php

namespace App\Models;

use App\Models\BackendModels\Industry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUpdate extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function get_userprofile(){
        return $this->belongsTo(User::class,'user_id');
        
        
        
   }

   public function industryProfile(){
    return $this->belongsTo(Industry::class,'industry_id');
    
   }
}
