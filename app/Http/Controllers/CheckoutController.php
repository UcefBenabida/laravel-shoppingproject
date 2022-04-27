<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function checkout()
    {  
        $total = \Cart::getTotal();
        $amount = $total * 100;
        $message = "";
        if($total > 0) 
        {

            // Enter Your Stripe Secret
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                    
            $payment_intent = \Stripe\PaymentIntent::create([
                'description' => 'Stripe Test Payment',
                'amount' => $amount,
                'currency' => 'INR',
                'description' => 'Payment From Shoping',
                'payment_method_types' => ['card'],
            ]);
            
            $intent = $payment_intent->client_secret;

            return view('checkout.credit-card',compact('intent'));
        }
        else
        {
            $message = "votre panier est vide" ;
            return redirect()->route('cart.list');
        }
        

    }

    public function afterPayment()
    {
        echo 'Payment Has been Received';
    }
}
