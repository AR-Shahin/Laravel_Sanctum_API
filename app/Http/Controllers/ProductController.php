<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return $this->sendResponse($products, 'Products retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data =  $request->validated();
        $product = Product::create($data);
        return $this->sendResponse($product,'Product Created Successfully!',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('category')->find($id);

        return $product ? $this->sendResponse($product, 'Product retrieved Successfully!', 200) : $this->sendError('Product not found.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response([
            'data' => Product::with('category')->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if($product){
            $product->update($request->validated());
        }
        return $product ? $this->sendResponse($product, 'Product Updated Successfully!!', 200) : $this->sendError('Product not found.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }

        return $product ? $this->sendResponse([], 'Product Deleted Successfully!!', 200) : $this->sendError('Product not found.');
    }
}
