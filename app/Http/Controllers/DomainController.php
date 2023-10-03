<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filter;
use App\Models\Domain;
use DataTables;

class DomainController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if($request->filter){
                $filter = Filter::find($request->filter);
                if($filter){
                    $data = Domain::select('*');
                    if($filter->damin != ''){   $data->where('da', '>=', $filter->damin); }
                    if($filter->damax != ''){   $data->where('da', '<=', $filter->damax); }
                    if($filter->pamin != ''){   $data->where('pa', '>=', $filter->pamin); }
                    if($filter->pamax != ''){   $data->where('pa', '<=', $filter->pamax); }
                    // if($filter->drmin != ''){   $data->where('dr', '>=', $filter->drmin); }
                    // if($filter->drmax != ''){   $data->where('dr', '<=', $filter->drmax); }
                    // if($filter->urmin != ''){   $data->where('ur', '>=', $filter->urmin); }
                    // if($filter->urmax != ''){   $data->where('ur', '<=', $filter->urmax); }
                    // if($filter->rdmin != ''){   $data->where('ref', '>=', $filter->rdmin); }
                    // if($filter->rdmax != ''){   $data->where('ref', '<=', $filter->rdmax); }
                    // if($filter->blmin != ''){   $data->where('backlinks', '>=', $filter->blmin); }
                    // if($filter->blmax != ''){   $data->where('backlinks', '<=', $filter->blmax); }
                    // if($filter->agemin != ''){  $data->where('age', '>=', $filter->agemin); }
                    // if($filter->agemax != ''){  $data->where('age', '<=', $filter->agemax); }
                    // if($filter->pricemin != ''){    $data->where('price', '>=', $filter->pricemin); }
                    // if($filter->pricemax != ''){    $data->where('price', '<=', $filter->pricemax); }
                    // $data->where('name', 'like', '%.com');
                    return Datatables::of($data)
                            ->addIndexColumn()
                            ->make(true);
                }
            }else{
                $data = Domain::select('*'); //->where('name', 'like', '%.com');
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->make(true);
            }
        }

        $filters = Filter::get();
          
        return view('domains', ['filters' => $filters]);
    }

    public function store(Request $request){
        $domain = new Domain;
        $domain->name = $request->name;
        $domain->da = $request->da;
        $domain->pa = $request->pa;
        $domain->ref = $request->ref;
        $domain->tf = $request->tf;
        $domain->cf = $request->cf;
        $domain->ree = $request->ree;
        $domain->dr = $request->dr;
        $domain->ur = $request->ur;
        $domain->dp = $request->dp;
        $domain->aby = $request->aby;
        $domain->acr = $request->acr;
        $domain->add_date = $request->add_date;
        $domain->registrar = $request->registrar;
        $domain->market_place = $request->market_place;
        $domain->price = $request->price;
        $domain->cate1 = $request->cate1;
        $domain->cate2 = $request->cate2;
        $domain->status = $request->status;
        $domain->save();
        
        return response()->json(['message' => 'Lưu thông tin thành công!', 'status' => 200]); 
    }
    
    public function update(Request $request, Domain $domain){
        $domain->name = $request->name;
        $domain->da = $request->da;
        $domain->pa = $request->pa;
        $domain->ref = $request->ref;
        $domain->tf = $request->tf;
        $domain->cf = $request->cf;
        $domain->ree = $request->ree;
        $domain->dr = $request->dr;
        $domain->ur = $request->ur;
        $domain->dp = $request->dp;
        $domain->aby = $request->aby;
        $domain->acr = $request->acr;
        $domain->add_date = $request->add_date;
        $domain->registrar = $request->registrar;
        $domain->market_place = $request->market_place;
        $domain->price = $request->price;
        $domain->cate1 = $request->cate1;
        $domain->cate2 = $request->cate2;
        $domain->status = $request->status;
        $domain->save();
        
        return response()->json(['message' => 'Lưu thông tin thành công!', 'status' => 200]); 
    }

    public function destroy(Domain $domain){
        $domain->delete();

        return response()->json(['message' => 'Xóa thông tin thành công!', 'status' => 200]); 
    }

    public function removeDupplicateDomain(){
        $status = 0;
        while($status == 0){
            $domain = Domain::where('delet', 0)->first();
            if($domain){
                $domain->delet = 1;
                $domain->save();
                
                Domain::where('name', $domain->name)->where('delet', 0)->delete();
            }else{
                $status = 1;
            }
        }
    }
}
