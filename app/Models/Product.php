<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    /**
     * fillable
     * 
     * @var array
     */

     protected $fillable = [
        'image',
        'title',
        'category_product_id',
        'supplier_id',
        'description',
        'price',
        'stock',
        'discount',
     ];

    public function get_product(){
        //get all products
        $sql = $this->select("products.*", "category_product.product_category_name as product_category_name", "suppliers.nama_supplier as nama_supplier", DB::raw("products.price * (1 - (products.discount / 100)) as final_price"))
                    ->join('category_product', 'category_product.id', '=', 'products.category_product_id')
                    ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id');
        

        return $sql;
    }

    public function get_category_product() {
        $sql = DB::table('category_product')->select('*');
        return $sql;
    }
    
}

