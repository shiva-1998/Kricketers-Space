<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ground;

class GroundController extends Controller
{
    public function index()
    {
        $grounds = Ground::latest()->paginate(8);
        // return $grounds;
        return view('back.grounds.index', compact('grounds'));
    }
}
