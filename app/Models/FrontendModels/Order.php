<?php

namespace App\Models\FrontendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BackendModels\Product;
use App\Models\FrontendModels\UserAddress;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class, 'id','product_id');
    }
    public function billing_address(){
        return $this->hasOne(UserAddress::class, 'id','billing_address_id');
    }
    public function shipping_address(){
        return $this->hasOne(UserAddress::class, 'id','shipping_address_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function full_name($id){
        $user = User::find($id);
        return ucfirst($user->name);
        // return ucfirst($user->first_name).' '.ucfirst($user->last_name);
    }

}
