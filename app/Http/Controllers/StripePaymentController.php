<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Stripe;


class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => 100 * 4,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Orange"
        ]);

        Session::flash('success', 'Payment successful!');

        return back();

    }
}
