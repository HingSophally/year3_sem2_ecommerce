<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\shopping_cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;


class Shopping_cartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_color_id' => 'required|exists:productcolor,id',
            'product_size_id' => 'required|exists:productsize,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();

        // Attempt to retrieve an existing cart item
        $cartItem = shopping_cart::where([
            ['user_id', $userId],
            ['product_id', $request->product_id],
            ['productcolor_id', $request->product_color_id],
            ['productsize_id', $request->product_size_id],
        ])->first();

        if ($cartItem) {
            $cartItem->increment('quanity', $request->quantity); // Use increment method
        } else {
            $cartItem = shopping_cart::create([
                'user_id' => $userId,
                'product_id' => $request->product_id,
                'productcolor_id' => $request->product_color_id,
                'productsize_id' => $request->product_size_id,
                'quanity' => $request->quantity,
            ]);
        }

        return response()->json(['message' => 'Item added to cart successfully!', 'cart_item' => $cartItem], 201);
    }

    public function show()
    {
        $userId = Auth::id();

        // Retrieve cart items with product, color, size, and one image per product
        $cart = DB::table('shopping_carts as sc')
            ->join('products as p', 'sc.product_id', '=', 'p.id')
            ->join('productcolor as pc', 'sc.productcolor_id', '=', 'pc.id')
            ->join('colors as c', 'pc.color_id', '=', 'c.id')
            ->join('productsize as ps', 'sc.productsize_id', '=', 'ps.id')
            ->join('sizes as s', 'ps.size_id', '=', 's.id')
            ->where('sc.user_id', $userId)
            ->select([
                'p.name as product_name',
                'p.id as product_id',
                'p.base_price as base_price',
                'p.discount as discount',
                'c.color as color_name',
                'pc.additional_price as color_additional_price',
                'pc.id as productcolor_id',
                's.size as size_name',
                'ps.additional_price as size_additional_price',
                'ps.id as productsize_id',
                'sc.quanity',
                DB::raw('(SELECT image FROM images WHERE product_id = p.id LIMIT 1) as product_image')
            ])
            ->get();

        return response()->json(['cart' => $cart]);
    }
    public function delete()
    {
        $userId = Auth::id();
        try {
            shopping_cart::where('user_id', $userId)->delete();
            return response()->json(['response' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete shopping cart: ' . $e->getMessage()], 500);
        }
    }
    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        $cartTotal = $request->input('cart_total');  // Get the cart total from the request

        // Validate inputs
        if (empty($couponCode)) {
            return response()->json(['success' => false, 'message' => 'Coupon code is required']);
        }

        if (!is_numeric($cartTotal) || $cartTotal <= 0) {
            return response()->json(['success' => false, 'message' => 'Invalid cart total']);
        }

        // Find the coupon by code
        $coupon = Coupon::where('code', $couponCode)->first();
        if (!$coupon || !$coupon->isValid()) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired coupon code']);
        }

        // Check if cart total meets minimum purchase requirement
        if ($coupon->min_purchase > $cartTotal) {
            return response()->json(['success' => false, 'message' => 'Your cart total is below the minimum for this coupon. The minimum purchase is $' . number_format($coupon->min_purchase, 2)]);
        }

        // If coupon exists and is valid, calculate the discount
        $discount = 0;
        if ($coupon->discount_type == 'percentage') {
            // Percentage discount
            $discount =  ($coupon->discount_value / 100);
            //            $discount = $cartTotal * ($coupon->discount_value / 100);
        } else if ($coupon->discount_type == 'fixed') {
            // Fixed amount discount
            $discount = $coupon->discount_value;
        }
        $minpurchase = $coupon->min_purchase;

        return response()->json(['success' => true, 'discount' => $discount, 'min_purchase' => $minpurchase, 'description' => $coupon->description, 'coupon_id' => $coupon->id]);
    }
}
