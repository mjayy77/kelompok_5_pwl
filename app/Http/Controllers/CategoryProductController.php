<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage; 

class CategoryProductController extends Controller
{
    /**
     * index
     * 
     * @return void
     */

    public function index() : View
    {
        //get all categories
        // $categories = CategoryProduct::select("categories.*")
        //                     ->latest()
        //                     ->paginate(10);

        $category = new CategoryProduct;
        $categories = $category->get_category_product()
                            ->orderBy('product_category_name', 'asc')
                            ->paginate(10);
        //render view with categories
        return view('categories.index', compact('categories'));
    }

    /**
     * create
     * 
     * @return View
     */

    public function create():View
    {
        $category = new CategoryProduct;
        
        $data['categories'] = $category->get_category_product()->get();
 
        return view('categories.create', compact('data'));
    }

    /**
     * store
     * 
     * @param mixed $request
     * @return RedirectResponse
     */

    public function store(Request $request):RedirectResponse
    {
        //validate from
        $validatedData = $request->validate([
            'image'                      => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'product_category_name'      => 'required|min:1',
            'description'                => 'required|min:5',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->store('public/images');
            
            CategoryProduct::create([
                'image'                      => $image->hashName(),
                'product_category_name'      => $request->product_category_name,
                'description'                => $request->description,
            ]);

            return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }   
 
        return redirect()->route('categories.index')->with(['error' => 'Data Gagal Disimpan!']);
    }

    /**
     * Show
     *
     * @param string $id
     * @return View
     */
    public function show(string $id): View 
    {
        $category = CategoryProduct::findOrFail($id);

        return view('categories.show', compact('category'));
    }

    /**
     * edit
     * 
     * @param mixed $id
     * @return View
     */

    public function edit(string $id): View
    {
        $categories = new CategoryProduct;
        $data['category'] = $categories->get_category_product()->where("category_product.id", $id)->firstOrFail();

        return view('categories.edit', compact('data'));
    }
 
    /**
      * update
      * 
      * @param mixed $request
      * @param mixed $id
      * @return RedirectResponse
      */
 
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'                      => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'product_category_name'      => 'required|min:1',
            'description'                => 'required|min:5',
        ]);
 
        $category = CategoryProduct::findOrFail($id);

        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());
        
            //delete old image
            Storage::delete('public/images/' . $category->image);
 
            $category->update([
                'image'                      => $image->hashName(),
                'product_category_name'      => $request->product_category_name,
                'description'                => $request->description,
            ]);
        } else {
            $category->update([
                'product_category_name'      => $request->product_category_name,
                'description'                => $request->description,
            ]);
        }

        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
     * 
     */
    public function destroy(CategoryProduct $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}