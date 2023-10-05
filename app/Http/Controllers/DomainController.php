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
                    $data = Domain::where('domain', 'like', '%.com');
                    if($filter->damin != ''){   $data->where('da', '>=', $filter->damin); }
                    if($filter->damax != ''){   $data->where('da', '<=', $filter->damax); }
                    if($filter->pamin != ''){   $data->where('pa', '>=', $filter->pamin); }
                    if($filter->pamax != ''){   $data->where('pa', '<=', $filter->pamax); }
                    if($filter->tfmin != ''){   $data->where('tf', '>=', $filter->tfmin); }
                    if($filter->tfmax != ''){   $data->where('tf', '<=', $filter->tfmax); }
                    if($filter->cfmin != ''){   $data->where('cf', '>=', $filter->cfmin); }
                    if($filter->cfmax != ''){   $data->where('cf', '<=', $filter->cfmax); }
                    if($filter->rdmin != ''){   $data->where('rd', '>=', $filter->rdmin); }
                    if($filter->rdmax != ''){   $data->where('rd', '<=', $filter->rdmax); }
                    if($filter->blmin != ''){   $data->where('bl', '>=', $filter->blmin); }
                    if($filter->blmax != ''){   $data->where('bl', '<=', $filter->blmax); }
                    if($filter->agemin != ''){  $data->where('age', '>=', $filter->agemin); }
                    if($filter->agemax != ''){  $data->where('age', '<=', $filter->agemax); }
                    if($filter->pricemin != ''){    $data->where('price', '>=', $filter->pricemin); }
                    if($filter->pricemax != ''){    $data->where('price', '<=', $filter->pricemax); }

                    if($request->status){
                        switch($request->status){
                            case 'available-soon': $data->where('status', 'like', '%Available Soon%');
                            case 'available': $data->where('status', 'like', '%Buy It Now%');
                            case 'in-auction': $data->where('status', 'like', '%In Auction%');
                            case 'domain-exp': $data->where('status', '!=', 'Available Soon')->where('status', '!=', 'Buy It Now')->where('status', '!=', 'In Auction');
                        }
                        return Datatables::of($data->orderBy('id', 'desc'))
                            ->addIndexColumn()
                            ->make(true);
                    }else{
                        return Datatables::of($data->orderBy('id', 'desc'))
                            ->addIndexColumn()
                            ->make(true);
                    }
                }
            }else{
                $data = Domain::where('domain', 'like', '%.com');
                if($request->status){
                    switch($request->status){
                        case 'available-soon': $data->where('status', 'Available Soon');
                        case 'available': $data->where('status', 'Buy It Now');
                        case 'in-auction': $data->where('status', 'In Auction');
                        case 'domain-exp': $data->where('status', '!=', 'Available Soon')->where('status', '!=', 'Buy It Now')->where('status', '!=', 'In Auction');
                    }
                }
                return Datatables::of($data->orderBy('id', 'desc'))
                        ->addIndexColumn()
                        ->make(true);
            }
        }

        $filters = Filter::get();
          
        return view('domains', ['filters' => $filters]);
    }

    public function store(Request $request){
        $domain = new Domain;
        $domain->domain = $request->domain;
        $domain->source = $request->source;
        $domain->tf = $request->tf;
        $domain->cf = $request->cf;
        $domain->bl = $request->bl;
        $domain->rd = $request->rd;
        $domain->languages = $request->languages;
        $domain->da = $request->da;
        $domain->pa = $request->pa;
        $domain->age = $request->age;
        $domain->score = $request->score;
        $domain->redirects = $request->redirects;
        $domain->history = $request->history;
        $domain->domain_drops = $request->domain_drops;
        $domain->total_organic_results = $request->total_organic_results;
        $domain->semrush_traffic = $request->semrush_traffic;
        $domain->semrush_rank = $request->semrush_rank;
        $domain->semrush_keyword_number = $request->semrush_keyword_number;
        $domain->date_added = $request->date_added;
        $domain->price = $request->price;
        $domain->expiry_date = $request->expiry_date;
        $domain->status = $request->status;
        $domain->status_seo = $request->status_seo;
        $domain->save();
        
        return response()->json(['message' => 'Lưu thông tin thành công!', 'status' => 200]); 
    }
    
    public function update(Request $request, Domain $domain){
        $domain->domain = $request->domain;
        $domain->source = $request->source;
        $domain->tf = $request->tf;
        $domain->cf = $request->cf;
        $domain->bl = $request->bl;
        $domain->rd = $request->rd;
        $domain->languages = $request->languages;
        $domain->da = $request->da;
        $domain->pa = $request->pa;
        $domain->age = $request->age;
        $domain->score = $request->score;
        $domain->redirects = $request->redirects;
        $domain->history = $request->history;
        $domain->domain_drops = $request->domain_drops;
        $domain->total_organic_results = $request->total_organic_results;
        $domain->semrush_traffic = $request->semrush_traffic;
        $domain->semrush_rank = $request->semrush_rank;
        $domain->semrush_keyword_number = $request->semrush_keyword_number;
        $domain->date_added = $request->date_added;
        $domain->price = $request->price;
        $domain->expiry_date = $request->expiry_date;
        $domain->status = $request->status;
        $domain->status_seo = $request->status_seo;
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
                
                Domain::where('domain', $domain->domain)->where('delet', 0)->delete();
            }else{
                $status = 1;
            }
        }
    }

    public function test(){
        $domains = Domain::where('order_time', 'like', '%Aug%')->get();
        dd($domains);
        foreach($domains as $domain){
            $old_time = strtotime($domain->order_time);
            $new_date = date('Y-m-d H:i:s', $old_time);  
            $domain->order_time = $new_date;
            $domain->save();
        }
    }

    public function test2(){
        $domains = Domain::where('order_time', 'like', '%Jul%')->get();
        dd($domains);
        foreach($domains as $domain){
            $old_time = strtotime($domain->order_time);
            $new_date = date('Y-m-d H:i:s', $old_time);  
            $domain->order_time = $new_date;
            $domain->save();
        }
    }
}
