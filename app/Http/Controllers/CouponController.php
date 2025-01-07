<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    //
//    public function applyCoupon(Request $request)
//    {
//        $couponCode = $request->input('coupon_code');
//
//        // Find the coupon by code
//        $coupon = Coupon::where('code', $couponCode)->first();
//
//        if (!$coupon || !$coupon->isValid()) {
//            return response()->json(['success' => false, 'message' => 'Invalid or expired coupon code']);
//        }
//
//        // Calculate the discount amount
//        $cartTotal = $request->input('cart_total');
//        $discount = 0;
//
//        if ($coupon->discount_type == 'percentage') {
//            $discount = $cartTotal * ($coupon->discount_value / 100);
//        } elseif ($coupon->discount_type == 'fixed') {
//            $discount = $coupon->discount_value;
//        }
//
//        // Return the discount value
//        return response()->json(['success' => true, 'discount' => $discount]);
//    }
//
//// Method to calculate the discount based on coupon type
//    protected function calculateDiscount($coupon, $cartTotal)
//    {
//        if ($coupon->discount_type == 'percentage') {
//            return $cartTotal - ($cartTotal * ($coupon->discount_value / 100));
//        } elseif ($coupon->discount_type == 'fixed') {
//            return $cartTotal - $coupon->discount_value;
//        } elseif ($coupon->discount_type == 'free_shipping') {
//            return $cartTotal; // Free shipping doesn’t affect the total cart value
//        }
//        return $cartTotal; // If no discount type is matched
//    }

}
