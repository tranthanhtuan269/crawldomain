<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;

class HomeController extends Controller
{
    public function index(Request $request){
        $items = \DB::table('contents')->get();
        foreach($items as $item){
            \App\Helpers\Helper::getData($item->content);
        }
    }
    
    public function index2(Request $request){
        $items = \DB::table('contents2')->get();
        foreach($items as $item){
            \App\Helpers\Helper::getData2($item->content);
        }
    }
    
    public function index3(Request $request){
        $items = \DB::table('contents3')->get();
        foreach($items as $item){
            \App\Helpers\Helper::getData3($item->content);
        }
    }

    public function test(){
        $domains = Domain::where('name', 'like', '%.com')->take(10)->get();
        $listDomain = [];
        foreach($domains as $domain){
            $listDomain[] = $domain->name;
        }

        //set POST variables
        $url = 'https://www.dapachecker.org/checkDA_new';
        $fields = array(
            'tool_id' => 1,
            'parent_id' => 1,
            'url' => 0,
            'domain' => 0,
            'links' => $listDomain
        );
        // dd($fields);

        //url-ify the data for the POST
        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //execute post
        $result = curl_exec($ch);
        echo $result;

        //close connection
        curl_close($ch);
    }
}
