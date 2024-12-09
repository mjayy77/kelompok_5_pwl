<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

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
            'product_category_name'      => 'required|min:1',
            'description'                => 'required|min:5',
        ]);

        CategoryProduct::create([
            'product_category_name'      => $request->product_category_name,
            'description'                => $request->description,
        ]);
 
        return redirect()->route('categories.index')->with(['success' => 'Data berhasil disimpan!']);
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
        $category = CategoryProduct::findOrFail($id);

        return view('categories.edit', compact('category'));
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
            'product_category_name'      => 'required|min:1',
            'description'                => 'required|min:5',
        ]);
 
        $category = CategoryProduct::findOrFail($id);
 
            $category->update([
                'product_category_name'      => $request->product_category_name,
                'description'                => $request->description,
            ]);

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