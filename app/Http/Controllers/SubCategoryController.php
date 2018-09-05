<?php

namespace App\Http\Controllers;

use App\Category;
use App\GarmentOption;
use App\SubCategory;
use App\SystemFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;


class SubCategoryController extends VBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $sub_category = new SubCategory();

        $desgin_options = Category::where('id', '!=', $id)->get();

        return view('admin.sub_categories.create', compact('id', 'sub_category', 'desgin_options'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        try {
            \DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
            ]);

            if (empty($request->all())) {

                return redirect()->back()->with('error', 'Please Fill all the Required Field');
            }
            if (!empty($validator->fails())) {
                return redirect()->back()->withInput()->with('error', $validator->errors());
            }

            $subcategory = new SubCategory();
            $subcategory->title = $request->title;
            $subcategory->description = $request->description;
            $subcategory->slug = str_slug($request->title);
            $subcategory->category_id = $request->category_id;


            if ($subcategory->save()) {
                SystemFile::saveUploadedFile($request->file('image'), $subcategory);
            }
            \DB::commit();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit;
        }


        return redirect()->route('categories.show', $subcategory->category_id)->with('success', $subcategory->title . ' ' . 'is successfully Added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subcategory = SubCategory::find($id);
        $systemfiles = SystemFile::where('model_id', '=', $subcategory->id)->where('model_type', '=', get_class($subcategory))->get();

        return view('admin.sub_categories.edit', compact('subcategory', 'systemfiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $category = SubCategory::find($id);
        if (empty($request->all())) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        $category->update($request->all());
        SystemFile::saveUploadedFile($request->file('image'), $category);
        return redirect()->route('categories.show', $category->category_id)->with('success', $category->title . ' is successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (SubCategory::destroy($id)) {
            // record deleted
            return redirect()->back()->with('success', 'SubCategory is successfully deleted');
        } else {
            // record failed to be deleted
            return redirect()->back()->with('success', 'Something Went Wrong');

        }
    }

    public function ajax($id)
    {

        if ($id == null) {
            $subcategories = SubCategory::query();

        } else {
            $subcategories = SubCategory::where('category_id', '=', $id);
        }

        return Datatables::eloquent($subcategories)
            ->addColumn("action", function ($user) {
                return view('admin.sub_categories.partial.action', compact('user'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }


}
