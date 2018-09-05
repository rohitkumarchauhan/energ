<?php

namespace App\Http\Controllers;

use App\Category;
use App\GarmentOption;
use App\SystemFile;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

class CategoryController extends VBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = null)
    {
        //

        if (!$this->auth_user->hasPermissionTo('categories.index')) {
            abort('403_admin');
        }
        $title = 'Garments';
        return view('admin.categories.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type = null)
    {
        //
        if (!$this->auth_user->hasPermissionTo('categories.create')) {
            abort('403_admin');
        }


        $title = 'Garment';
        $category = new Category();
        return view('admin.categories.create', compact('category', 'desgin_option', 'title', 'type'));
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
                'position' => 'required|unique:categories'
            ]);

            if (empty($request->all())) {
                return redirect()->back()->with('error', 'Please Fill all the Required Field');
            }
            if (!empty($validator->fails())) {
                return redirect()->back()->withInput()->with('error', $validator->errors());
            }
            $category = new Category();
            $category->title = $request->title;
            $category->description = $request->description;
            $category->slug = str_slug($request->title);
            $category->position = $request->position;

            if (!empty($request->type_id)) {
                $category->type_id = $request->type_id;

            }
            if ($category->save()) {
                SystemFile::saveUploadedFile($request->file('image'), $category);
            }
            \DB::commit();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit;
        }

        return redirect()->route('categories.index')->with('success', $category->title . ' ' . 'is successfully Added');


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


        $category = Category::find($id);
        if ($category->type_id == Category::TYPE_CUSTOME_GARMENTS) {
            $title = 'Garments';
        } else {
            $title = 'Category';
        }

        $file = SystemFile::where('model_id', '=', $category->id)->where('model_type', '=', get_class($category))->first();

        return view('admin.categories.view', compact('category', 'file', 'title'));
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
        if (!$this->auth_user->hasPermissionTo('categories.edit')) {
            abort('403_admin');
        }

        $category = Category::find($id);
        if ($category->type_id == Category::TYPE_CUSTOME_GARMENTS) {
            $title = 'Garments';
        } else {
            $title = 'Category';
        }


        $systemfiles = SystemFile::where('model_id', '=', $category->id)->where('model_type', '=', get_class($category))->get();

        return view('admin.categories.edit', compact('category', 'systemfiles', 'title'));
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

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            //'position' => 'required|unique:categories,'.$id
        ]);

        if (empty($request->all())) {
            return redirect()->back()->with('error', 'Please Fill all the Required Field');
        }
        if (!empty($validator->fails())) {
            return redirect()->back()->withInput()->with('error', $validator->errors());
        }


        $category = Category::find($id);
        if (empty($request->all())) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        $category->update($request->all());

        SystemFile::saveUploadedFile($request->file('image'), $category);


        if ($category->type_id == Category::TYPE_CUSTOME_GARMENTS) {
            return redirect()->route('categories.index')->with('success', $category->title . ' ' . 'is successfully updated');

        } else {
            return redirect()->route('categories.categoryIndex', $category->type_id)->with('success', $category->title . ' ' . 'is successfully updated');

        }
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

        if (!$this->auth_user->hasPermissionTo('categories.delete')) {
            abort('403_admin');
        }

        if (Category::destroy($id)) {
            // record deleted
            return redirect()->back()->with('success', 'Categories is successfully deleted');
        } else {
            // record failed to be deleted
            return redirect()->back()->with('success', 'Something Went Wrong');

        }
    }


    public function ajax($type = null)
    {
        if (!empty($type)) {
            $categories = Category::where('type_id', $type);

        } else {
            $categories = Category::where('type_id', Category::TYPE_CUSTOME_GARMENTS);

        }
        return Datatables::eloquent($categories)
            ->addColumn("action", function ($user) {
                return view('admin.categories.partial.action', compact('user'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /***Other Type Categories*****/


    public function categoryIndex($type = null)
    {
        $title = 'Categories';
        return view('admin.categories.index', compact('title', 'type'));
    }


}
