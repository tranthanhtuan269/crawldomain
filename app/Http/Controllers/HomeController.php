<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $items = \DB::table('contents')->get();
        foreach($items as $item){
            \App\Helpers\Helper::getData($item->content);
        }
    }
}
