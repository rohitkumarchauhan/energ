<?php

namespace App\Http\Controllers;

use App\Page;
use Dotenv\Validator;
use Illuminate\Http\Request;
use DataTables;


class PageController extends VBaseController
{
    //


    public function index()
    {
        //
        $title = 'Pages';
        return view('admin.pages.index', compact('title'));
    }


    public function create()
    {
        //
        $title = 'Pages';
        $page = new Page();
        return view('admin.pages.create', compact('page', 'title'));
    }


    public function store(Request $request)
    {
        //
        try {
            \DB::beginTransaction();
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'title' => 'required|max:255',
                'description' => 'required',
            ]);
            if (empty($request->all())) {
                return redirect()->back()->with('error', 'Please Fill all the Required Field');
            }
            if (!empty($validator->fails())) {
                return redirect()->back()->withInput()->with('error', $validator->errors());
            }
//dd($request->all());

            $model = new Page();
            $model->title = $request->get('title');
            $model->description = $request->get('description');
            $model->type_id = $request->get('type_id');
            $model->save();


            \DB::commit();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit;
        }
        flash($model->title . ' ' . 'is successfully Added')->success();
        return redirect()->route('pages.index')->with('success', $model->title . ' ' . 'is successfully Added');


    }

    public function ajax()
    {

        $options = Page::query();
        return Datatables::eloquent($options)
            ->editColumn("description", function ($user) {
                return strip_tags(substr($user->description, 0, 250));
            })
            ->addColumn("action", function ($user) {
                return view('admin.pages.partial.action', compact('user'));
            })
            ->rawColumns(['action'])
            ->make(true);


    }

    public function edit($id)
    {
        //
        $title = 'Pages';
        $page = Page::find($id);
        return view('admin.pages.edit', compact('page', 'title'));
    }


    public function update(Request $request, $id)
    {
        $lining = Page::find($id);
        if (empty($request->all())) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        $lining->update($request->all());
        flash( $lining->title . ' ' . 'is successfully updated')->success();
        return redirect()->route('pages.index')->with('success', $lining->title . ' ' . 'is successfully updated');
    }


}
