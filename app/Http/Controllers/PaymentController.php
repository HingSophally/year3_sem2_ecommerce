<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success()
    {
        try {
            // Call the delete route to clear shopping cart
            $response = app()->make('App\Http\Controllers\Shopping_cartController')->delete();

            if ($response->getData()->response === 'success') {
                return redirect('/');
            }

            return response()->json(['error' => 'Failed to clear shopping cart'], 500);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to process payment success: ' . $e->getMessage()], 500);
        }
    }
}
