<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function landing(){
        $data = Product::with('multi_images')->first();
        $benefitsArray = explode("\n", $data->benefits);
        $productdetails = explode("\n", $data->product_details);
        $moredetails = explode("\n", $data->more_details);

        return view('landing',compact('data','benefitsArray','productdetails','moredetails'));
    }
}
