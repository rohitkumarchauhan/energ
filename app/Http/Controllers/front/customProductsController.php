<?php

namespace App\Http\Controllers\front;

use App\Cart;
use App\CartItem;
use App\Category;
use App\Fabric;
use App\GarmentMeasurementOption;
use App\GarmentOption;
use App\GarmentOptionAtrribute;
use App\Http\Controllers\VBaseController;
use App\LiningColour;
use App\LiningMaterial;
use App\MeasurementOption;
use App\MerchantBankAccount;
use App\OrderDetail;
use App\Payment;
use App\SystemFile;
use App\UserAddress;
use App\UserMeasurementDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class customProductsController extends VBaseController
{
    /**
     * @param array $middleware
     */
    public function index($slug, Request $request)
    {

        $category = Category::where('slug', $slug)->first();
        $fabrics = isset($category->fabrics) ? $category->fabrics : '';
        $garmentsOptions = GarmentOption::where('category_id', $category->id)->get();
        $lining_colour = LiningColour::where('category_id', $category->id)->get();
        $garmentMeasurementOptions = GarmentMeasurementOption::where('category_id', $category->id)->pluck('measurement_option_id');
        $bodyTypes = MeasurementOption::where('type', 1)->whereIn('id', $garmentMeasurementOptions)->get();
        $measurements = MeasurementOption::where('type', 2)->whereIn('id', $garmentMeasurementOptions)->paginate('8');
        $already_measurements = MeasurementOption::where('type', 2)->whereIn('id', $garmentMeasurementOptions)->get();
        if (Auth::check()) {
            $userMeasurement = UserMeasurementDetail::where('category_id', $category->id)->where('user_id', Auth::user()->id)->get();

        } else {
            $userMeasurement = '';
        }
        //return $measurements;
        if ($request->ajax()) {

            return view('frontEnd.custom_products._ajax_measurement', compact('measurements'));
        }
        return view('frontEnd.custom_products.index', compact('fabrics', 'garmentsOptions', 'slug', 'bodyTypes', 'measurements', 'lining_colour', 'category', 'already_measurements', 'userMeasurement'));
    }


    public function edit($id, Request $request)
    {
        $cart = Cart::find($id);

        /**
         * Category ===>Garments
         **/
        $category = Category::find($cart->cart_item->category_id);
        $fabrics = isset($category->fabrics) ? $category->fabrics : '';
        $garmentsOptions = GarmentOption::where('category_id', $category->id)->get();
        $lining_colour = LiningColour::where('category_id', $category->id)->get();

        /** This is used to get the Measurement on the Basis of Garment Category    **/


        $garmentMeasurementOptions = GarmentMeasurementOption::pluck('measurement_option_id')->where('category_id', $category->id);
        $bodyTypes = MeasurementOption::where('type', 1)->whereIn('id', $garmentMeasurementOptions)->get();
        $measurements = MeasurementOption::where('type', 2)->whereIn('id', $garmentMeasurementOptions)->paginate('8');
        //return $measurements;

        if ($request->ajax()) {
            return view('frontEnd.custom_products._ajax_measurement', compact('measurements', 'cart'));
        }
        return view('frontEnd.custom_products.index', compact('fabrics', 'garmentsOptions', 'slug', 'bodyTypes', 'measurements', 'lining_colour', 'category', 'cart'));
    }


    public function getFabricLiningMaterial(Request $request)
    {
        if (!empty($request->id)) {
            $lining_data = LiningMaterial::where('fabric_id', $request->id)->paginate(20);
            return view('frontEnd.custom_products._ajax_lining_material', compact('lining_data'));
        }

    }

    public function finalProduct(Request $request)
    {

        $data = [];
        if (empty($request->all())) {
            return 'No Result Found';
        }
        $mongram_id = $request->get('monogram')['id'];
        $monogram_value = $request->get('monogram')['value'];
        $linning_material = LiningMaterial::find($request->get('linining_material'));
        $styles = GarmentOptionAtrribute::whereIn('id', $request->get('style'))->get();
        $measurements = $request->get('measurement');
        $body = MeasurementOption::where('id', $request->get('body'))->first();
        $side = MeasurementOption::find($request->get('side'));
        $monogram = GarmentOptionAtrribute::where('id', $mongram_id)->first();
        $lining_colour = LiningColour::where('id', $request->get('lining_color'))->first();
        return view('frontEnd.custom_products.final_product', compact('linning_material', 'styles', 'body', 'side', 'measurements', 'lining_colour', 'monogram', 'monogram_value'));


    }


    public function checkout()
    {
        if (isset($_COOKIE['cookie_id'])) {
            $cookie_id = $_COOKIE['cookie_id'];
        } else {
            $cookie_id = 0;
        }

        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::user()->id)->orWhere('cookie_id', $cookie_id)->get();
            $total_amount = Cart::getAmount();
            $count = Cart::getCount();
        } else {
            $carts = Cart::where('cookie_id', $cookie_id)->get();
            $total_amount = Cart::getAmount();
            $count = Cart::getCount();

        }

        return view('frontEnd.custom_products.checkout', compact('carts', 'total_amount', 'count'));
    }


    public function removeFromCart($id)
    {

        if (Cart::destroy($id)) {
            // record deleted
            return redirect()->back()->with('success', 'Fabric is successfully deleted');
        } else {
            // record failed to be deleted
            return redirect()->back()->with('success', 'Something Went Wrong');

        }


    }

    public function address()
    {
        $billing_address = UserAddress::where('user_id', Auth::user()->id)->where('type', 'billing')->first();
        $shipping_address = UserAddress::where('user_id', Auth::user()->id)->where('type', 'shipping')->first();
        //return $shipping_address;
        return view('frontEnd.custom_products.user_address', compact('billing_address', 'shipping_address'));
    }

    public function addressStore(Request $request)
    {
        if (!empty($request)) {

            if (!empty($request->billing_id)) {
                $address = UserAddress::find($request->billing_id);
            } else {
                $address = new UserAddress();
            }
            $address->user_id = $request->user_id;
            $address->first_name = $request->firstname;
            $address->last_name = $request->lastname;
            $address->company = $request->company;
            $address->phone = $request->phone;
            $address->fax = $request->fax;
            $address->address = $request->street_1 . ' ' . $request->street_2;
            $address->zipcode = $request->postcode;
            $address->city = $request->city;
            $address->country = $request->country;
            $address->type = "billing";
            $address->save();

            if (!empty($request->shipping_id)) {
                $address = UserAddress::find($request->shipping_id);
            } else {
                $address = new UserAddress();
            }
            $address->user_id = $request->user_id;
            $address->first_name = $request->shipping_firstname;
            $address->last_name = $request->shipping_lastname;
            $address->company = $request->shipping_company;
            $address->phone = $request->shipping_phone;
            $address->fax = $request->shipping_fax;
            $address->address = $request->shipping_street_1 . ' ' . $request->shipping_street_2;
            $address->zipcode = $request->shipping_postcode;
            $address->city = $request->shipping_city;
            $address->country = $request->shipping_country;
            $address->type = "shipping";
            $address->save();

            return redirect()->route('front.final.checkout')->with('success', 'Address Succesfullly Saved.');
        }
        return view('frontEnd.custom_products.user_address');
    }

    public function finalCheckout()
    {

        if (isset($_COOKIE['cookie_id'])) {
            $cookie_id = $_COOKIE['cookie_id'];
        } else {
            $cookie_id = 0;
        }

        $carts = Cart::where('user_id', Auth::user()->id)->orWhere('cookie_id', $cookie_id)->get();
        $total_amount = Cart::where('user_id', Auth::user()->id)->orWhere('cookie_id', $cookie_id)->sum('amount');
        $count = Cart::where('user_id', Auth::user()->id)->orWhere('cookie_id', $cookie_id)->count();

        return view('frontEnd.custom_products.final_checkout', compact('carts', 'total_amount', 'count'));

    }


    public function payment_by_bank()
    {

        $bank_details = MerchantBankAccount::where('status', 1)->first();
        return view('frontEnd.payments.pay_by_bank', compact('bank_details'));


    }


}
