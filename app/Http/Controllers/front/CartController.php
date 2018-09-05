<?php

namespace App\Http\Controllers\front;

use App\Cart;
use App\CartItem;
use App\Category;
use App\Fabric;
use App\GarmentMeasurementOption;
use App\Http\Controllers\VBaseController;
use App\MeasurementOption;
use App\UserMeasurementDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends VBaseController
{
    //
    public function add_to_cart(Request $request)
    {
        $data = [];
        $data['status'] = 'NOK';
        if (!$request->all()) {
            return $data;
        }
//        $cart = Cart::where('user_id', Auth::user()->id)->first();
//        if (empty($cart)) {
        $cart = new Cart();
//        }
        if (!Auth::check()) {
            $data = $this->addToCartByGuestUser($request, $cart);

        } else {
            $data = $this->addToCartByUser($request, $cart);

        }
        return $data;
    }


    public function addToCartByGuestUser($request, $cart)
    {
        $data = [];
        try {
            \DB::beginTransaction();

            if (!isset($_COOKIE['cookie_id'])) {
                $cookie_id = $cart->getToken(15);
            } else {
                $cookie_id = $_COOKIE['cookie_id'];
            }
            $cart->cookie_id = $cookie_id;
            setcookie('cookie_id', $cookie_id, time() + 86400); // 1 day
            $cart->product_name = 'Product-' . $request->get('linining_material');
            $cart->amount = $request->get('price');
            $cart->quantity = 1;

            if ($cart->save()) {
                $cartItem = CartItem::where('cart_id', $cart->id)->first();
                if (empty($cartItem)) {
                    $cartItem = new CartItem();
                }
                $cartItem->fabric_id = $request->get('febric_id');
                $cartItem->cart_id = $cart->id;
                $cartItem->linining_material_id = $request->get('linining_material');
                $cartItem->style = json_encode($request->get('style'));
                $cartItem->measurement = json_encode($request->get('measurement'));
                $cartItem->back_id = $request->get('body');
                $cartItem->side_id = $request->get('side');
                $cartItem->category_id = $request->get('category_id');
                $cartItem->monogram = json_encode($request->get('monogram'));
                $cartItem->lining_color = $request->get('lining_color');
                $cartItem->save();
                $this->addUserMeasurement($request->get('measurement'));
                \DB::commit();

                $data['status'] = 'OK';
                $data['count'] = Cart::getCount();
                $data['amount'] = Cart::getAmount();
                $data['current_amount'] = $cart->amount;
                $data['title'] = isset($cart->cart_item->fabric) ? $cart->cart_item->fabric->title : '';

                $data['id'] = $cart->id;
                $data['url'] = $cartItem->lining_material->getImagePath();
            }

        } catch (\Exception $e) {

            return false;

        }
        return $data;


    }


    public function addToCartByUser($request, $cart)
    {
        try {

            \DB::beginTransaction();

            $data = [];
            $cart->user_id = Auth::user()->id;
            $cart->product_name = 'Product-' . $request->get('linining_material');
            $cart->amount = $request->get('price');
            $cart->quantity = 1;

            if ($cart->save()) {
                $cartItem = CartItem::where('cart_id', $cart->id)->first();
                if (empty($cartItem)) {
                    $cartItem = new CartItem();
                }
                $cartItem->fabric_id = $request->get('febric_id');
                $cartItem->cart_id = $cart->id;
                $cartItem->linining_material_id = $request->get('linining_material');
                $cartItem->style = json_encode($request->get('style'));
                $cartItem->measurement = json_encode($request->get('measurement'));
                $cartItem->back_id = $request->get('body');
                $cartItem->side_id = $request->get('side');
                $cartItem->category_id = $request->get('category_id');
                $cartItem->monogram = json_encode($request->get('monogram'));
                $cartItem->lining_color = $request->get('lining_color');
                $cartItem->save();
                $this->addUserMeasurement($request->get('measurement'), $request->get('category_id'), $cartItem->back_id, $cartItem->side_id);

                \DB::commit();
                $data['status'] = 'OK';
                $data['count'] = Cart::getCount();
                $data['amount'] = Cart::getAmount();
                $data['current_amount'] = $cart->amount;
                $data['title'] = isset($cart->cart_item->fabric) ? $cart->cart_item->fabric->title : '';


                $data['id'] = $cart->id;
                $data['url'] = $cartItem->lining_material->getImagePath();

            }
        } catch (\Exception $e) {
            return false;
        }
        return $data;

    }


    public function destroy($id)
    {

        if (Cart::destroy($id)) {
            return redirect()->back()->with('success', 'Cart is successfully removed');
        } else {
            return redirect()->back()->with('success', 'Something Went Wrong');
        }

    }

    public function addUserMeasurement($measurements, $category_id, $back_id, $side_id)
    {

        if (!empty($measurements)) {
            foreach ($measurements as $measurement) {

                $user_measurement = UserMeasurementDetail::where('category_id', $category_id)
                    ->where('measurement_id', $measurement['id'])
                    ->where('user_id', Auth::user()->id)->first();
                if (empty($user_measurement)) {
                    $user_measurement = new UserMeasurementDetail();

                }
                $user_measurement->category_id = $category_id;
                $user_measurement->user_id = Auth::user()->id;
                $user_measurement->measurement_id = $measurement['id'];
                $user_measurement->measurement_value = $measurement['value'];
                $user_measurement->save();
//                $garment_measurement_options = GarmentMeasurementOption::
//                where('measurement_option_id', $user_measurement->measurement_id)
//                    ->where('category_id', '!=', $category_id)
//                    ->distinct('category_id')->pluck('category_id');
//
//                print_r($garment_measurement_options);exit;


            }

            if (!empty($back_id)) {
                $user_measurement = UserMeasurementDetail::where('category_id', $category_id)
                    ->where('type_id', 1)
                    ->where('user_id', Auth::user()->id)->first();

                if (empty($user_measurement)) {
                    $user_measurement = new UserMeasurementDetail();

                }
                $user_measurement->category_id = $category_id;
                $user_measurement->type_id = 1;
                $user_measurement->user_id = Auth::user()->id;
                $user_measurement->measurement_id = $back_id;
                $user_measurement->measurement_value = 0;
                $user_measurement->save();


            }

            if (!empty($side_id)) {
                $user_measurement = UserMeasurementDetail::where('category_id', $category_id)
                    ->where('type_id', 2)
                    ->where('user_id', Auth::user()->id)->first();

                if (empty($user_measurement)) {
                    $user_measurement = new UserMeasurementDetail();

                }
                $user_measurement->category_id = $category_id;
                $user_measurement->type_id = 2;
                $user_measurement->user_id = Auth::user()->id;
                $user_measurement->measurement_id = $side_id;
                $user_measurement->measurement_value = 0;
                $user_measurement->save();


            }


        }

    }


    public function userMeasurementByAjax(Request $request)
    {

        $categroy_id = $request->get('category_id');
        $category = Category::find($categroy_id);
        $garmentMeasurementOptions = GarmentMeasurementOption::where('category_id', $categroy_id)->pluck('measurement_option_id');
        $bodyTypes = MeasurementOption::where('type', 1)->whereIn('id', $garmentMeasurementOptions)->get();
        $already_measurements = MeasurementOption::where('type', 2)->whereIn('id', $garmentMeasurementOptions)->get();
        $measurements = MeasurementOption::where('type', 2)->whereIn('id', $garmentMeasurementOptions)->paginate('8');
        $isAjax = 1;
        if (Auth::check()) {
            $userMeasurement = UserMeasurementDetail::where('category_id', $categroy_id)->where('user_id', Auth::user()->id)->get();

        } else {
            $userMeasurement = '';
        }


        return view('frontEnd.custom_products.partial.measurement_already', compact('garmentMeasurementOptions', 'already_measurements', 'bodyTypes', 'userMeasurement', 'category', 'measurements', 'isAjax'));

    }


}
