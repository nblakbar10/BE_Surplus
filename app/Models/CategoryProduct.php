<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    public $table = "category_product";
    protected $fillable = [
        'product_id',
        'category_id',
    ];
   
    protected $hidden = [
        'id'
    ];
    
    public $timestamps = false;
}
