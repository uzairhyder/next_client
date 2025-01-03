<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'industry_name',
        'industry_type',
        'status'
    ];

     public function profile()
    {
         return $this->belongsTo(ProfileUpdate::class,'user_id');
         
    }

    public function user(){
        return $this->belongsTo(User::class,'industry_id');
    }
}
