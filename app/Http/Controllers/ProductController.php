<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\ProductType;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{   
    private $url = 'https://656ca88ee1e03bfd572e9c16.mockapi.io/products';
    public function index(){
        $response = Http::get($this->url);
        $products = $response->json();
        return view('products.index', compact('products'));
    }



    // public function getAllProduct(){
    //     $newproducts = Product::where('new', 1)->paginate(4);
    //     $topproducts = Product::where('new', 0)->paginate(4);
    //     $productType = ProductType::all();
    //     return view('page.productType', compact('newproducts', 'topproducts', 'productType'));
    // }

    public function showProduct($id){
        $products = Product::where('id_type', $id)->get();
        $productType = ProductType::all();
        $categoryName = ProductType::where('id', $id)->value('name') ?? 'Không có danh mục';
        return view('page.productType', compact('products', 'productType', 'categoryName'));
    }
    public function create(){
        return view('products.create');
    }



    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);
    
        $response = Http::post($this->url, $validatedData);
        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }
    

    public function edit($id){
        $response = Http::get($this->url.'/'.$id);
        $product = $response->json();
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id){
        $response = Http::put($this->url.'/'.$id, $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|integer|min:1'
            ]
        ));
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }   

    public function destroy($id){
        $response = Http::delete($this->url.'/'.$id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
