<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->id);
        return view('frontEnd.events.events');
    }
}
