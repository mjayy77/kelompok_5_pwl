<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $table = 'category_product'; 
    
    protected $fillable = [
        'image',
        'product_category_name',
        'description',
    ]; 

    
    public function get_category_product()
    {
        return $this->select("category_product.*"); 
    }
}