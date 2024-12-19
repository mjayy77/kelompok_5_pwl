<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index() : view
    {
        //get all products
        // $products = Product::select("products.*", "category_product.product_category_name as product_category_name")
        //                      ->join('category_product', 'category_product.id', '=', 'products.category_product_id')
        //                      ->latest()
        //                      ->paginate(10);

        $product = new Product;
        $products = $product->get_product()
                            ->orderBy('title', 'asc')
                            ->paginate(12);

        $category = new CategoryProduct;
        $categories = $category->get_category_product()
                               ->orderBy('product_category_name', 'asc')
                               ->paginate(5);

        //render view with products
        return view('home.index', compact('products', 'categories'));
    }

    /**
      * show 
      *
      * @param mixed $id
      * @return View
      */
      public function show(string $id): View 
      {

        //get data by ID
        $product_model = new Product;
        $product = $product_model->get_product()->where("products.id", $id)->firstOrFail();

        return view('home.show', compact('product'));
      }
}
