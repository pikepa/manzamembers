<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SpecialClasses\Category_Type;

class CategoryController extends Controller
{
    /**
     * Restricting certain functions to Auth Users only.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['bycategory']]);
    }


    /**
     * Display a listing of categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // category loaded via appServiceProvider    
        return view('categories.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bycategory($id)
    {
        $cat = Category::findOrFail($id);

        $products = $cat->products;

        return view('dashboard.home', compact('products', 'cat'));
    }

    /**
     * Create a new Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {           
                     
      //  $type= new Category_Type;
      //  $types=$type->gettypes();

        return view('categories.create');

    }

    /**
     * Store a new Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
                'category' => 'required',
                'type' => 'required |in:EVT,MEM,PRI,TRM',
                'active' => 'required',
            ]);

        $category = new Category;

        $category->category = $request->category;
        $category->type = $request->type;  //this is to avoid the db rejecting
        $category->active = $request->active;

        $category->save();

        return view('categories.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $attributes = request()->validate([
                'category' => 'required',
                'type' => 'required |in:EVT,MEM,PRI,TRM',
                'active' => 'required|in:1,0',
        ]);

        $category->update($attributes);

        return view('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $category->delete();

        return redirect('category')->with('Success', 'Category has been deleted');
    }
}
