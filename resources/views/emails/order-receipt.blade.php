<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            border-bottom: 2px solid #e41e31;
            padding-bottom: 20px;
            margin-bottom: 20px;
            position: relative;
        }

        .header h1 {
            margin: 0;
            color: #e41e31;
            font-size: 24px;
            text-align: center;
        }

        .logo {
            position: absolute;
            top: 0;
            right: 20px;
            width: 80px;
        }

        .receipt-info {
            text-align: right;
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }

        .details-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .details-box {
            width: 48%;
        }

        .details-box h3 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #e41e31;
        }

        .details-box p {
            margin: 5px 0;
            line-height: 1.6;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .items-table th {
            background: #e41e31;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            text-align: left;
        }

        .items-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .price {
            font-family: monospace;
        }

        .discount {
            color: #e41e31;
        }

        .totals {
            text-align: right;
            margin-top: 20px;
        }

        .totals p {
            margin: 5px 0;
            font-size: 16px;
        }

        .totals h3 {
            margin-top: 10px;
            font-size: 20px;
            color: #e41e31;
        }

        .remarks {
            margin-top: 30px;
            font-size: 14px;
            line-height: 1.4;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Top Section -->
        <div class="top-section">
            <div class="company-info">
                <h1><strong>Baramey</strong></h1>
                <p>123 Street Address</p>
                <p>Cambodia, Phnom Penh, 120000</p>
                <p>Tel: 01888888</p>
                <p>Baramey@gmail.com</p>
            </div>
            {{-- <div class="logo">
                <img src="{{ asset('logo/logo.png') }}" alt="Logo">
            </div> --}}
            <div class="receipt-info">
                <p><strong>Payment Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
                <p><strong>Receipt No.:</strong> {{ $order->id }}</p>
            </div>
        </div>

        <!-- Header Section -->
        <div class="header">
            <h1>Receipt</h1>
        </div>

        <div class="details-section">
            <div class="details-box">
                <h3>Bill To</h3>
                <p><strong>Name:</strong> {{ $customerInfo['name'] }}</p>
                <p><strong>Address:</strong> {{ $customerInfo['shipping_address'] }}</p>
                <p><strong>Email:</strong> {{ $customerInfo['email'] }}</p>
                <p><strong>Phone:</strong> {{ $customerInfo['phone'] }}</p>
            </div>
            <div class="details-box">
                <h3>Ship To</h3>
                <p><strong>Name:</strong> {{ $customerInfo['name'] }}</p>
                <p><strong>Address:</strong> {{ $customerInfo['shipping_address'] }}</p>
                <p><strong>Phone:</strong> {{ $customerInfo['phone'] }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
            </div>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Base Price</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td class="price">${{ number_format($item->product->base_price, 2) }}</td>
                        <td>
                            {{ $item->productColor->color->color }}
                            @if ($item->productColor->additional_price > 0)
                                <span
                                    class="price">+${{ number_format($item->productColor->additional_price, 2) }}</span>
                            @endif
                        </td>
                        <td>
                            {{ $item->productSize->size->size }}
                            @if ($item->productSize->additional_price > 0)
                                <span
                                    class="price">+${{ number_format($item->productSize->additional_price, 2) }}</span>
                            @endif
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td class="price discount">
                            @php
                                $subtotal = $item->price * $item->quantity;
                                $discount = $subtotal - $item->final_price;
                            @endphp
                            @if ($discount > 0)
                                -${{ number_format($discount, 2) }}
                            @else
                                $0.00
                            @endif
                        </td>
                        <td class="price">${{ number_format($item->final_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="totals">
            <p>Subtotal: <strong>${{ number_format($order->total_price + $payment->discount_amount, 2) }}</strong></p>
            @if ($payment->discount_amount > 0)
                <p>Discount: <strong>-${{ number_format($payment->discount_amount, 2) }}</strong></p>
            @endif
            <p>Tax ({{ $payment->tax_rate }}%): <strong>${{ number_format($payment->tax_amount, 2) }}</strong></p>
            <p>Shipping: <strong>${{ number_format($payment->shipping_fee, 2) }}</strong></p>
            <h3>Total Paid: ${{ number_format($payment->amount, 2) }}</h3>
        </div>

        <div class="remarks">
            <p><strong>Remarks:</strong> Thank you for your purchase! If you have any questions, feel free to contact
                our support team.</p>
        </div>
    </div>
</body>

</html>
