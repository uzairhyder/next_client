<?php

namespace App\Models\BackendModels;

use App\Models\FrontendModels\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    public function get_parent_category(){
        return $this->belongsTo(ParentCategory::class,'parent_category_id');
    }
    public function get_main_category(){
        return $this->belongsTo(MainCategory::class,'main_category_id');
    }
    public function get_sub_category(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
    public function get_brand_name(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function order(){
        return $this->hasOne(Order::class,'product_id')->withDefault();
    }

}
