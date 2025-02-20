<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            $response = $this->gateway->purchase([
                'amount' => $request->input('amount'), // yahan amount_paid ki jagah amount use karein
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ])->send();
    
            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    

   public function success(Request $request)
{
    if ($request->input('paymentId') && $request->input('PayerID')) {
        $transaction = $this->gateway->completePurchase([
            'payer_id' => $request->input('PayerID'),
            'transactionReference' => $request->input('paymentId')
        ]);

        $response = $transaction->send();

        if ($response->isSuccessful()) {
            $arr = $response->getData();

            $payment = new Payment();
            $payment->payment_id = $arr['id'];
            $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
            $payment->payer_email = $arr['payer']['payer_info']['email'];
            $payment->amount = $arr['transactions'][0]['amount']['total'];
            $payment->currency = env('PAYPAL_CURRENCY');
            $payment->payment_status = $arr['state'];
            $payment->save();

            // Retrieve course_id
            $course_id = $request->input('course_id');
            if (!$course_id) {
                return redirect()->route('home')->with('error', 'Invalid course selection.');
            }

            // Check if the user already purchased the course
            $existingPurchase = Purchase::where('user_id', Auth::id())
                ->where('course_id', $course_id)
                ->first();

            if ($existingPurchase) {
                return redirect()->route('purchases.index')->with('error', 'You have already purchased this course.');
            }
                  // Create a new purchase
                $purchase = Purchase::create([
                    'purchase_id' => uniqid('PUR-'),
                    'course_id' => $request->course_id,
                    'user_id' => Auth::id(),
                    'purchase_date' => now(),
                    'amount_paid' => $request->amount_paid,
                    'payment_status' => $request->payment_status,
                ]);

            return redirect()->route('home')->with('success', 'Payment successful! Transaction ID: ' . $arr['id']);
        } else {
            return redirect()->route('home')->with('error', $response->getMessage());
        }
    } else {
        return redirect()->route('home')->with('error', 'Payment declined!');
    }
}

    

    public function error()
    {
        return 'User declined the payment!';   
    }

}