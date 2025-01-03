<?php

namespace App\Models\FrontendModels;

use App\Models\BackendModels\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function get_product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
