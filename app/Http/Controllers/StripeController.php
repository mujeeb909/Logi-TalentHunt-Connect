<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StripeController extends Controller
{

    public function makePayment(Request $request)
    {


        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $planName = $request->input('plan_name');
        $planDuration = $request->input('duration');
        $planAmount = $request->input('amount');

        $total = $planAmount * 100;

        $user = User::where('email', $refEmail)->first();
        $userId = $user->id;


        try {
            $customerList = \Stripe\Customer::all(['email' => $donorEmail]);
            $customer = $customerList->data[0] ?? null;
        } catch (\Stripe\Exception\ApiErrorException $e) {

            return redirect()->back()->with('error', 'Failed to retrieve customer information.');
        }

        if (!$customer) {
            try {
                $customer = \Stripe\Customer::create(['email' => $donorEmail]);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                return redirect()->back()->with('error', 'Failed to create new customer.');
            }
        }



        $session = \Stripe\Checkout\Session::create([
            'customer' => $customer->id,
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'product_data' => [
                            'name' => $name,
                        ],
                        'unit_amount' => $total,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            // Omit session_id here
            'success_url' => route('success', [
                'user_id' => $userId,
                'name' => $name,
                'donorEmail' => $donorEmail,
                'refEmail' => $refEmail,
                'amount' => $amount,
                'organization' => $organization,
            ], absolute: true),
            'cancel_url' => route('cancel', [], absolute: true),
        ]);




        // Redirect to the Stripe Checkout page
        return redirect()->away($session->url);
    }
}
