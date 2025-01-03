<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'price',
        'description',
        'package_points',
        'status'
    ];
    protected $attributes = [
        'status' => 1
    ];
}
