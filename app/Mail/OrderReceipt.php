<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderReceipt extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $items;
    public $payment;
    public $customerInfo;

    public function __construct(Order $order)
    {
        $this->order = $order;

        // Load all necessary relationships
        $order->load([
            'orderItems.product',
            'orderItems.productColor.color',
            'orderItems.productSize.size',
            'payment',
            'user'
        ]);

        $this->items = $order->orderItems;
        $this->payment = $order->payment;

        // Extract phone number from shipping address
        $addressParts = explode(',', $order->shipping_address);
        $phone = trim(end($addressParts));

        // Prepare customer info
        $this->customerInfo = [
            'name' => $order->user->name,
            'email' => $order->user->email,
            'phone' => $phone,
            // Split shipping address without the phone number
            'shipping_address' => implode(',', array_slice($addressParts, 0, -1)),
        ];
    }

    public function build()
    {
        return $this->subject('Order Confirmation #' . $this->order->id)
            ->view('emails.order-receipt');
    }
}
