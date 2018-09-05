<?php

namespace App\Http\Controllers\front;

use App\Category;
use App\Http\Controllers\VBaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends VBaseController
{
    //

    public function index()
    {
        $garments = Category::with('getImages', 'getFebricVarient', 'getFebricVarient.fabric')->orderBy('position', 'asc')->get();
        //return $garments;
        return view('frontEnd.products.index', compact('garments'));

    }

    public function productList()
    {

        return view('frontEnd.products.list');

    }
}
