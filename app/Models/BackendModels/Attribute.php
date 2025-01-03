<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    // protected $fillable = ['product_id','attribute','attribute_value','stock'];

    public function get_ids(){
        return $this->belongsTo(Product::class,'product_id');
    }


}
