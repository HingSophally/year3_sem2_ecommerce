<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProductVariant;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Size;
use App\Models\SizeProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('images', 'images.product_id', '=', 'products.id')
            ->select(
                'products.id as id',
                'products.name as name',
                'products.created_at as created_at',
                'images.image as image',
                'products.base_price as price',
                'categories.name as category_name',
            )
            ->get();

        return view('admin.product_list', compact('product'));
    }

    // ProductController.php
    public function show_category()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category');
        $product->base_price = $request->input('base_price');
        $product->discount = $request->input('discount');
        $product->save();


        return redirect('/add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create_detail(Request $request)
    {
        try {
            $selectedProduct = $request->input('product_id');
            $filenames = ['filename1', 'filename2', 'filename3'];

            // Loop through each filename and handle the upload
            foreach ($filenames as $filename) {
                if ($request->hasFile($filename)) {
                    $file = $request->file($filename);
                    $path = $file->store('images', 'public');
                    $filename = basename($path);

                    // Create a new Image record
                    $image = new Image();
                    $image->product_id = $selectedProduct;
                    $image->image = $filename;
                    $image->save();
                }
            }

            // Create ProductColor record
            $product_color = new ProductColor();
            $product_color->product_id = $selectedProduct;
            $product_color->color_id = $request->input('color');
            $product_color->additional_price = $request->input('additional_price_size');
            $product_color->save();

            // Create ProductSize record
            $product_size = new ProductSize();
            $product_size->product_id = $selectedProduct;
            $product_size->size_id = $request->input('size');
            $product_size->additional_price = $request->input('additional_price_color');
            $product_size->save();

            // Redirect with success message (optional)
            return redirect('/product_variant')->with('success', 'Details created successfully.');
        } catch (\Exception $e) {
            // Log the error and redirect back with an error message
            \Log::error('Error creating details: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating details.');
        }
    }

    public function getProduct($id)
    {
        $product = Product::with(['productColors.color', 'productSizes.size', 'images']) // Eager load relationships
            ->where('id', $id)
            ->first();
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Build the desired response structure
        $response = [
            'id' => $product->id,
            'name' => $product->name,
            'base_price' => $product->base_price,
            'discount' => $product->discount,
            'description' => $product->description,
            'color' => [],
            'images' => []
        ];
        foreach ($product->images as $image) {
            $response['images'][] = asset('storage/images/' . $image->image); // Adjust path as necessary
        }

        // Iterate through product colors to build the response
        foreach ($product->productColors as $productColor) {
            $colorData = [
                'color' => $productColor->color->color, // Adjust based on your colors table structure
                'addition_price' => $productColor->additional_price,
                'productcolor_id' => $productColor->id,
                'size' => [],
            ];

            // Fetch sizes associated with the product color
            foreach ($product->productSizes as $productSize) {
                if ($productSize->product_id === $product->id || $productSize->additional_price === $productColor->additional_price) { // Adjust this logic
                    $sizeData = [
                        'size' => $productSize->size->size, // Adjust based on your sizes table structure
                        'addition_price' => $productSize->additional_price,
                        'productsize_id' => $productSize->id
                    ];
                    $colorData['size'][] = $sizeData; // Add size to the color data
                }
            }

            $response['color'][] = $colorData; // Add color data to the response
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $product = Product::all();
        $category = Category::all();
        $size = Size::all();
        $color = Color::all();

        return view('admin.product_variant', compact('category', 'size', 'color', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
