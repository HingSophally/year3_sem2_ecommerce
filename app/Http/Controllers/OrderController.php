<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use log;
use App\Mail\OrderReceipt;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function processPayPalOrder(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'shipping_address' => 'required|string',
            'total_price' => 'required|numeric',
            'cart_items.*.product_id' => 'required|integer|exists:products,id',
            'cart_items.*.productcolor_id' => 'required|integer|exists:productcolor,id',
            'cart_items.*.productsize_id' => 'required|integer|exists:productsize,id',
            'cart_items.*.quantity' => 'required|integer|min:1',
            'cart_items.*.base_price' => 'required|numeric',
            'cart_items.*.color_additional_price' => 'required|numeric',
            'cart_items.*.size_additional_price' => 'required|numeric',
            'cart_items.*.discount' => 'nullable|numeric|min:0|max:100',
            'paypal_order_id' => 'required|string',
            'paypal_payer_id' => 'required|string',
            'coupon_id' => 'nullable|integer',
            'discount_amount' => 'nullable|numeric'
        ]);

        try {
            DB::beginTransaction();

            // Create the order
            $order = Order::create([
                'user_id' => Auth::id(),
                'status' => 'pending',
                'shipping_address' => $validatedData['shipping_address'],
                'total_price' => $validatedData['total_price'],
                'coupon_id' => $validatedData['coupon_id'] ?? null,
            ]);

            // Create order items
            foreach ($validatedData['cart_items'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'productcolor_id' => $item['productcolor_id'],
                    'productsize_id' => $item['productsize_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['base_price'] + $item['color_additional_price'] + $item['size_additional_price'],
                    'final_price' => ($item['base_price'] + $item['color_additional_price'] + $item['size_additional_price'])
                        * $item['quantity'] * (1 - $item['discount'] / 100),
                ]);
            }

            // Create payment record
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => 'PayPal',
                'payment_status' => 'completed',
                'discount_amount' => $validatedData['discount_amount'] ?? 0,
                'amount' => $validatedData['total_price'],
            ]);

            DB::commit();

            // Send order receipt email
            $order = Order::with([
                'orderItems.product',
                'orderItems.productColor',
                'orderItems.productSize',
                'payment'
            ])
                ->find($order->id);

            Mail::to($request->user()->email)->send(new OrderReceipt($order));

            \Log::info('Order Dataaa:', $request->all());
            \Log::info('Payment Data:', [
                'order_id' => $order->id,
                'payment_method' => 'PayPal',
                'payment_status' => 'completed',
                'discount_amount' => $validatedData['discount_amount'] ?? 0,
                'amount' => $validatedData['total_price'],
            ]);

            return response()->json(['success' => true, 'order_id' => $order->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error processing PayPal order: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Error processing order'], 500);
        }
    }
}
