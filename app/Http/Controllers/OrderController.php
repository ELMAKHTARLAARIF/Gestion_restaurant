<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateContactRequest;
use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\PaymentIntent;


class OrderController extends Controller
{
    public function store(Request $request)
{
    dd($request->all());
    $validator = Validator::make($request->all(), [
        'prenom' => 'required',
        'nom' => 'required',
        'email' => 'required|email',
        'telephone' => 'required',
        'items' => 'required'
    ]);
    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    return response()->json([
        'success' => true
    ]);
}

public function createPaymentIntent(Request $request)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $amount = $request->total * 100; // MAD → centimes

    $intent = PaymentIntent::create([
        'amount' => $amount,
        'currency' => 'mad',
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    return response()->json([
        'clientSecret' => $intent->client_secret
    ]);
}
}
