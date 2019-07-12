<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('publish_at', 'desc')->get();

        return view('dashboard.home', compact('products'));
    }

    /**
     * Display a listing of the products by status.
     *
     * @return \Illuminate\Http\Response
     */
    public function status($status)
    {
        $products = Product::OfStatus($status)->get();

        return view('dashboard.home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assignedCats = [];

        return view('products.create', compact('assignedCats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->publish_at = new Carbon($request->get('publish_at'));
        $product = auth()->user()->products()->create($this->validateRequest());
        $product->categories()->sync($request->categories);

        return redirect($product->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findorFail($id);
        $images = $product->getMedia('photos');
        $foundcats = $product->categories;
        $assignedCats = $product->categories->pluck('id')->toArray();
        //     dd($assignedCats);
        return view('homepages.product_detail', compact('product', 'images', 'foundcats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // $this->authorize('manage', $product);

        $product = Product::findorFail($product->id);
        $assignedCats = $product->categories->pluck('id')->toArray();

        return view('products.edit', compact('product', 'assignedCats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->publish_at = new Carbon($request->get('publish_at'));
        //   dd($request->categories);
        //      $attributes = request()->validate([
        //         'featured_img' => 'required',
        //         'title' => 'required',
        //         'description'=>'required',
        //         'status'=>'required|in:For Sale,Not For Sale,Sold,',
        //         'price' => 'required',
        //         'discount' => 'required',
        //         'publish_at'=>'required|date',
        //     ]);

        //     $this->authorize('manage', $product);
        $product->update($this->validateRequest());
        $product->categories()->sync($request->categories);

        return redirect($product->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

     //   $this->authorize('manage', $product);

        $product->delete();

        return redirect('/');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'featured_img' => '',
            'title' => 'required',
            'description'=>'required',
            'status'=>'required|in:For Sale,Not For Sale,Sold,',
            'price' => 'required',
            'discount' => 'required',
            'publish_at'=>'required|date',
        ]);
    }
}
