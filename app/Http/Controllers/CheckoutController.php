<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        return view('checkout', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) return redirect()->back()->with('error', 'Your cart is empty.');

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        // Create order
        $order = Order::create([
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'payment_method' => $request->payment_method,
            'total' => $total,
        ]);

        // Save order items
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // GCash Payment via PayMongo
        if ($request->payment_method === 'gcash') {
            $client = new Client();
            $response = $client->post('https://api.paymongo.com/v1/sources', [
                'auth' => [env('PAYMONGO_SECRET'), ''],
                'json' => [
                    'data' => [
                        'attributes' => [
                            'type' => 'gcash',
                            'amount' => $total * 100, // in cents
                            'currency' => 'PHP',
                            'redirect' => [
                                'success' => route('checkout.success', $order->id),
                                'failed' => route('checkout.failed', $order->id),
                            ],
                        ],
                    ],
                ],
            ]);

            $body = json_decode($response->getBody(), true);

            // Redirect user to PayMongo GCash payment page
            return redirect($body['data']['attributes']['redirect']['checkout_url']);
        }

        // COD Payment
        session()->forget('cart');
        return redirect()->route('checkout.success', $order->id);
    }

    public function success(Order $order)
    {
        // Eager load items and their products
        $order = Order::with('items.product')->find($order->id);

        session()->forget('cart');

        return view('checkout-success', compact('order'));
    }

    public function failed(Order $order)
    {
        return view('checkout-failed', compact('order'));
    }
}
