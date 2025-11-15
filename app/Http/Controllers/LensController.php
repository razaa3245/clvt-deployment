<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class LensController extends Controller
{
    //public function dashboard()
public function dashboard()
{
    return view('admin.dashboard'); // make sure this view exists
}


}
