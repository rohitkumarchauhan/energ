<?php

namespace App\Http\Controllers\front;

use App\Cart;
use App\CartItem;
use App\Http\Controllers\Controller;
use App\MerchantBankAccount;
use App\OrderDetail;
use App\Payment;
use App\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function paymentCancel(Request $request)
    {
        return 'Payment has been cancel';
    }

    public function payment_by_bank()
    {

        $bank_details = MerchantBankAccount::where('status', 1)->first();
        return view('frontEnd.payments.pay_by_bank', compact('bank_details'));


    }

    public function storePaymentByBank(Request $request)
    {

        $amount = Cart::where('user_id', Auth::user()->id)->sum('amount');


        if (!empty($amount)) {

            $payment_model = new Payment();
            $payment_model->user_id = Auth::user()->id;
            $payment_model->transaction_id = 'pay_with_bank';
            $address = UserAddress::where('user_id', Auth::user()->id)->first();
            $payment_model->address_id = $address->id;
            $payment_model->amount = $amount;
            $payment_model->currency_code = '$';

            $payment_model->payment_status = 'SUCCESS';
            if ($payment_model->save()) {
                $cartItems = Cart::where('user_id', Auth::user()->id)->get();
                foreach ($cartItems as $cart) {
                    $order_items = new OrderDetail();
                    $order_items->user_id = Auth::user()->id;
                    $order_items->payment_id = $payment_model->id;
                    $order_items->product_name = $cart->product_name;
                    $order_items->quantity = $cart->quantity;
                    $order_items->amount = $cart->amount;
                    $order_items->fabric_id = $cart->cart_item->fabric_id;
                    $order_items->linining_material_id = $cart->cart_item->linining_material_id;
                    $order_items->measurement = $cart->cart_item->measurement;
                    $order_items->style = $cart->cart_item->style;
                    $order_items->monogram = $cart->cart_item->monogram;
                    $order_items->lining_color = $cart->cart_item->lining_color;
                    $order_items->save();
                    $cart->delete();
                }

            }

        }


        return view('frontEnd.custom_products.thankyou');
    }


}
