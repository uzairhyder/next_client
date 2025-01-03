<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PackageSubscription extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d',
    // ];

    protected $guarded = [];
    public function get_user(){
         return $this->belongsTo(User::class,'user_id');
    }

    public function get_package(){
        return $this->belongsTo(Package::class,'package_id');
    }
}
