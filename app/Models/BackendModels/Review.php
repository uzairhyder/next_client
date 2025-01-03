<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;



class Review extends Model
{
    use HasFactory;

    public function get_user(){
        return $this->belongsTo(User::class,'user_id');
    }
    //  public function industry(){
    //      return $this->hasone(Industry::class,'industry_id');
        
    // }
}