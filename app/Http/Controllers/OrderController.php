<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use DataTables;


class OrderController extends VBaseController
{
    //


    public function index()
    {
        //
        $title = 'Orders';
        return view('admin.orders.index', compact('title'));
    }


    public function ajax()
    {

        $options = Payment::query();

        return Datatables::eloquent($options)
            ->rawColumns(['action', 'image'])
            ->make(true);


    }


}
