<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Products::all();
        return view('dashboard.index', [
            'title'=> 'Dashboard',
            'products' => Products::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create', [
            'title'=> 'Create Product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // return $request->file('inputImage')->store('product-images');

        $validateData = $request->validate([
            'nama' => 'required|min:3|max:255|unique:products',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stock' => 'required|numeric',
            'inputImage' => 'required|image|mimes:jpeg,png|max:100'
        ]);

        $validateData['image_url'] = $request->file('inputImage')->store('product-images');
        $validateData['created_by'] = auth()->user()->id;

        Products::create($validateData);

        return redirect('/dashboard')->with('success', "Create product succesfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detailProduct = Products::find($id);
        return view('dashboard.show', [
            'detailProduct' => $detailProduct,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Products::find($id);

    if (!$product) {
        // Handle jika produk tidak ditemukan
        abort(404);
    }

    return view('dashboard.edit', [
        'title' => 'Update Product',
        'product' => $product
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // dd($request);

        // dd($id);

        // Ambil produk berdasarkan ID
        $product = Products::findOrFail($id);   
        
        $validateData = $request->validate([
            'nama' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('products')->ignore($product->id),
            ],            
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stock' => 'required|numeric',
            'inputImage' => 'image|mimes:jpeg,png|max:100'
        ]);

        if($request->file('image')){
            $validateData['image+_url'] = $request->file('image_url')->store('product-images');
        }

        // Perbarui produk dengan data yang telah divalidasi
        $product->update($validateData);

        return redirect('/dashboard')->with('success', 'Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        

        Products::destroy($id);


        return redirect('/dashboard')->with('success', 'Product deleted successfully');
    }
}
