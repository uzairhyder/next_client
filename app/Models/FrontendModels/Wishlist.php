<?php

namespace App\Models\FrontendModels;

use App\Models\BackendModels\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    public function get_product_name(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
