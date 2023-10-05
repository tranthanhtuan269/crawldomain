<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filter;

class FilterController extends Controller
{
    //

    public function store(Request $request){
        $filter = new Filter;
        $filter->name = $request->name;
        $filter->damin = $request->damin;
        $filter->damax = $request->damax;
        $filter->pamin = $request->pamin;
        $filter->pamax = $request->pamax;
        $filter->tfmin = $request->tfmin;
        $filter->tfmax = $request->tfmax;
        $filter->cfmin = $request->cfmin;
        $filter->cfmax = $request->cfmax;
        $filter->rdmin = $request->rdmin;
        $filter->rdmax = $request->rdmax;
        $filter->blmin = $request->blmin;
        $filter->blmax = $request->blmax;
        $filter->agemin = $request->agemin;
        $filter->agemax = $request->agemax;
        $filter->pricemin = $request->pricemin;
        $filter->pricemax  = $request->pricemax;
        $filter->save();
        
        return response()->json(['message' => 'Lưu thông tin thành công!', 'status' => 200]); 
    }

    public function update(Request $request, Filter $filter){
        $filter->name = $request->name;
        $filter->damin = $request->damin;
        $filter->damax = $request->damax;
        $filter->pamin = $request->pamin;
        $filter->pamax = $request->pamax;
        $filter->tfmin = $request->tfmin;
        $filter->tfmax = $request->tfmax;
        $filter->cfmin = $request->cfmin;
        $filter->cfmax = $request->cfmax;
        $filter->rdmin = $request->rdmin;
        $filter->rdmax = $request->rdmax;
        $filter->blmin = $request->blmin;
        $filter->blmax = $request->blmax;
        $filter->agemin = $request->agemin;
        $filter->agemax = $request->agemax;
        $filter->pricemin = $request->pricemin;
        $filter->pricemax  = $request->pricemax;
        $filter->save();
        
        return response()->json(['message' => 'Lưu thông tin thành công!', 'status' => 200]); 
    }

    public function destroy(Filter $filter){
        $filter->delete();

        return response()->json(['message' => 'Xóa thông tin thành công!', 'status' => 200]); 
    }
}
