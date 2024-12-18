<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index(Request $request) : view
    {
        //get all products
        // $products = Product::select("products.*", "category_product.product_category_name as product_category_name")
        //                      ->join('category_product', 'category_product.id', '=', 'products.category_product_id')
        //                      ->latest()
        //                      ->paginate(10);

        $query = $request->input('query');
        $sortBy = $request->input('sort_by', 'created_at'); // Default to created_at
        $order = $request->input('order', 'asc');

        $product = new Product;
        $products = $product->get_product()
                            ->orderBy($sortBy, $order)
                            ->when($query, function ($q) use ($query) {
                                  $q->where('title', 'like', "%{$query}%")
                                    ->orWhere('description', 'like', "%{$query}%");
                              })
                            ->paginate(10);

        // // Filter products by title or description
        // $products = Product::when($query, function ($q) use ($query) {
        //     $q->where('title', 'like', "%{$query}%")
        //       ->orWhere('description', 'like', "%{$query}%");
        // })->get();

        //render view with products
        return view('home.index', compact('products'));
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
