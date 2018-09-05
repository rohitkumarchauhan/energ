<?php

namespace App\Http\Controllers;

use App\MerchantBankAccount;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;


class MerchantBankAccountController extends VBaseController
{
    //


    public function index()
    {
        $title = 'Bank Details';
        return view('admin.bank_details.index', compact('title'));
    }


    public function ajax()
    {

        $options = MerchantBankAccount::query();

        return Datatables::eloquent($options)
            ->addColumn("action", function ($user) {
                return view('admin.bank_details.partial.action', compact('user'));
            })
            ->rawColumns(['action', 'image'])
            ->make(true);


    }

    public function create()
    {
        //
        $title = 'Create Bank Details';
        $lining = new MerchantBankAccount();
        return view('admin.bank_details.create', compact('lining', 'title'));
    }


    public function edit($id)
    {
        //
        $title = 'Bank Details';


        $model = MerchantBankAccount::find($id);


        return view('admin.bank_details.edit', compact('model', 'title'));
    }


    public function update(Request $request, $id)
    {
        $lining = MerchantBankAccount::find($id);
        if (empty($request->all())) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        $lining->update($request->all());
        return redirect()->route('bank_details.index')->with('success', $lining->name . ' ' . 'is successfully updated');
    }


    public function store(Request $request)
    {
        //
        try {
            \DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'code' => 'required|max:255',
                'address' => 'required|max:255',
                'bank_name' => 'required|max:255',
                'name' => 'required|max:255',
                'account_no' => 'required'

            ]);
            if (empty($request->all())) {
                return redirect()->back()->with('error', 'Please Fill all the Required Field');
            }
            if (!empty($validator->fails())) {
                return redirect()->back()->withInput()->with('error', $validator->errors());
            }

            $model = MerchantBankAccount::create($request->all());
            \DB::commit();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit;
        }
        return redirect()->route('bank_details.index')->with('success', $model->name . ' ' . 'is successfully Added');


    }
}
