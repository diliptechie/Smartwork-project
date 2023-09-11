<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(5);

        return view('products.index',compact('products'))->with('i',(request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'County' => 'required',
            'Country' => 'required',
            'Town' => 'required',
            'Description' => 'required',
            'Address' => 'required',
            'Number_of_Bedrooms' => 'required',
            'Number_of_Bathrooms' => 'required',
            'Price' => 'required',
            'Sale_or_Rent' => 'required',
            'Property_Type' => 'required',
            'Image' => 'required|Image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);

        if($request->Image){
            $imageName = time().'.'.$request->Image->extension();  
            $request->Image->move(public_path('images'), $imageName);
            $validatedData['Image'] = $imageName;
        }

        Product::create($validatedData);
        return redirect()->route('products.index')->withSuccess('Property created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $validatedData = $request->validate([
            'County' => 'required',
            'Country' => 'required',
            'Town' => 'required',
            'Description' => 'required',
            'Address' => 'required',
            'Number_of_Bedrooms' => 'required',
            'Number_of_Bathrooms' => 'required',
            'Price' => 'required',
            'Sale_or_Rent' => 'required',
            'Property_Type' => 'required',
            'Image' => 'required|Image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->Image){
            $imageName = time().'.'.$request->Image->extension();  
            $request->Image->move(public_path('images'), $imageName);
            $validatedData['Image'] = $imageName;
        }

        $product->update($validatedData);
        return redirect()->route('products.index')->withSuccess('Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')->withSuccess('Product deleted successfully.');
    }
}
