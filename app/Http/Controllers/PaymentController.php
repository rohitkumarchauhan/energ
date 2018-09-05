<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use App\MerchantBankAccount;
use App\OrderDetail;
use App\Payment;
use App\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {

        /*$product=Product::find($request->id);
        return view('payment',compact('product'));*/

    }

    public function paymentInfo(Request $request)
    {
        \Log::info('Test Paypal');
        \Log::info($request->all());
        \Log::info(json_decode($request));


        $cart = Cart::where('user_id', Auth::user()->id)->first();

        if (!empty($cart)) {

            $payment_model = new Payment();
            $payment_model->user_id = Auth::user()->id;
            $payment_model->transaction_id = $cart->getToken(15);
            $address = UserAddress::where('user_id', Auth::user()->id)->first();
            $payment_model->address_id = $address->id;
            $payment_model->amount = $cart->amount;
            $payment_model->currency_code = '$';

            $payment_model->payment_status = 'SUCCESS';
            if ($payment_model->save()) {
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
                if (CartItem::where('cart_id', $cart->id)->delete()) {
                    $cart->delete();
                }
            }

        }


        return view('frontEnd.custom_products.thankyou');
        //dd($request->tx);
        /*if($request->tx){
            if($payment=Payment::where('transaction_id',$request->tx)->first()){
                $payment_id=$payment->id;
            }else{
                $payment=new Payment;
                $payment->item_number=$request->item_number;
                $payment->transaction_id=$request->tx;
                $payment->currency_code=$request->cc;
                $payment->payment_status=$request->st;
                $payment->save();
                $payment_id=$payment->id;
            }
            return 'Pyament has been done and your payment id is : '.$payment_id;

        }else{
            return 'Payment has failed';
        }*/
    }

    public function paymentCancel(Request $request)
    {
        return 'Payment has been cancel';
    }




}
