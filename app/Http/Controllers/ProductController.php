<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

// use Image;

class ProductController extends Controller
{
    public function index()
    {
        $Products = Product::all();
        return view('products.index', compact('Products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(Request $request)
    {

// protected $fillable =['name','description','brand','cost-price','selling-price','image','total-stock','minimum-stock'];
        $request->validate(
            [
                "name" => "required|unique:products|max:255",
                "description" => "required",
                'brand' => 'required',
                "cost_price" => 'required',
                "selling_price" => 'required',
                "minimum_stock" => 'required',
                "total_stock" => 'required',
                "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]
        );
        $requestedData = $request->all();
        $image1 =Image::make($request->file('image'));
        $image1->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $imageName =  time() . '_' . $request->image->getClientOriginalName();
        $image1->save(public_path('images/'.$imageName));
        $requestedData['image'] = $imageName;
        Product::create($requestedData);
        return redirect("/product")->with('alert-success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view("products.edit", compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                "name" => "required|unique:products|max:255",
                "description" => "required",
                'brand' => 'required',
                "cost_price" => 'required',
                "selling_price" => 'required',
                "minimum_stock" => 'required',
                "total_stock" => 'required'
            ]
        );

        $requestedData = $request->all();
        // dd(gettype($requestedData));
        if (array_key_exists('image', $requestedData)) {
            unlink(public_path('images/' . $product->image));
            $imageName =  time() . '_' . $request->image->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
            $requestedData['image'] = $imageName;
        } 
        $product->update($requestedData);
        return redirect("/product")->with('alert-success', 'Product Updated Success fully successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // $productImg = $product->image;
        if (asset('images/' . $product->image)) {
            # code...
            unlink(public_path('images/' . $product->image));
        } else {
            return "no such file";
        }

        $product->delete();
        return redirect("/product")->with('alert-success', 'Product deleted successfully.');
    }
}
