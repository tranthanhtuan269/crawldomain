<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use Schema;

class HomeController extends Controller
{
    public function index(Request $request){
        if($request->search){
            $db = substr($request->search, 0, 2);
            $domain = \DB::table($db)->where('domain', $request->search)->first();
            return view('index', compact('domain'));
        }
        return view('index');
    }
    
    public function index2(Request $request){
        \App\Helpers\Helper::getData2();
    }
    
    public function index3(Request $request){
        $items = \DB::table('contents3')->get();
        foreach($items as $item){
            \App\Helpers\Helper::getData3($item->content);
        }
    }
    
    public function search(Request $request){
        if($request->search){
            $db = substr($request->search, 0, 2);
            $domain = \DB::table($db)->where('domain', $request->search)->first();
            return view('result', compact('domain'));
        }
    }

    public function test(){
        $domains = Domain::where('status', 0)->take(50000)->get();
        foreach($domains as $domain){
            $db = substr($domain->domain, 0, 2);

            if(!Schema::hasTable($db)){
                try {
                    $sql = "CREATE TABLE IF NOT EXISTS `$db` ( `id` int NOT NULL AUTO_INCREMENT, `domain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `source` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `tf` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `cf` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `bl` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `rd` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `languages` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `da` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `pa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `age` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `score` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `redirects` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `history` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `domain_drops` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `total_organic_results` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `semrush_traffic` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `semrush_rank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `semrush_keyword_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `date_added` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `expiry_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `expiry_date2` datetime NOT NULL DEFAULT '2023-01-01 01:01:01', `status` int DEFAULT '0', `status_seo` int NOT NULL DEFAULT '0', `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`id`), UNIQUE KEY `domain` (`domain`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
                    \DB::statement($sql);

                    \DB::table($db)->insertOrIgnore([
                        'domain' => $domain->domain,
                        'source' => $domain->source,
                        'tf' => $domain->tf,
                        'cf' => $domain->cf,
                        'bl' => $domain->bl,
                        'rd' => $domain->rd,
                        'languages' => $domain->languages,
                        'da' => $domain->da,
                        'pa' => $domain->pa,
                        'age' => $domain->age,
                        'score' => $domain->score,
                        'redirects' => $domain->redirects,
                        'history' => $domain->history,
                        'domain_drops' => $domain->domain_drops,
                        'total_organic_results' => $domain->total_organic_results,
                        'semrush_traffic' => $domain->semrush_traffic,
                        'semrush_rank' => $domain->semrush_rank,
                        'semrush_keyword_number' => $domain->semrush_keyword_number,
                        'date_added' => $domain->date_added,
                        'price' => $domain->price,
                        'expiry_date' => $domain->expiry_date,
                        'created_at' => $domain->created_at,
                        'updated_at' => $domain->updated_at
                    ]);
                    $domain->status = 1;
                    $domain->save();
                } catch (\Throwable $th) {
                    $domain->delete();
                }
            }else{
                try {
                    \DB::table($db)->insertOrIgnore([
                        'domain' => $domain->domain,
                        'source' => $domain->source,
                        'tf' => $domain->tf,
                        'cf' => $domain->cf,
                        'bl' => $domain->bl,
                        'rd' => $domain->rd,
                        'languages' => $domain->languages,
                        'da' => $domain->da,
                        'pa' => $domain->pa,
                        'age' => $domain->age,
                        'score' => $domain->score,
                        'redirects' => $domain->redirects,
                        'history' => $domain->history,
                        'domain_drops' => $domain->domain_drops,
                        'total_organic_results' => $domain->total_organic_results,
                        'semrush_traffic' => $domain->semrush_traffic,
                        'semrush_rank' => $domain->semrush_rank,
                        'semrush_keyword_number' => $domain->semrush_keyword_number,
                        'date_added' => $domain->date_added,
                        'price' => $domain->price,
                        'expiry_date' => $domain->expiry_date,
                        'created_at' => $domain->created_at,
                        'updated_at' => $domain->updated_at
                    ]);
                    $domain->status = 1;
                    $domain->save();
                } catch (\Throwable $th) {
                    $domain->delete();
                }
            }
        }
        header("Refresh:0");
    }

    public function test2(){
        $arr = [0,1,2,3,4,5,6,7,8,9,'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j' , 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        $arr2 = [0,1,2,3,4,5,6,7,8,9,'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j' , 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '-'];
        foreach($arr as $a){
            foreach($arr2 as $b){
                $sql = "CREATE TABLE IF NOT EXISTS `$a$b` ( `id` int NOT NULL AUTO_INCREMENT, `domain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `source` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `tf` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `cf` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `bl` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `rd` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `languages` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `da` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `pa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `age` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `score` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `redirects` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `history` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `domain_drops` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `total_organic_results` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `semrush_traffic` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `semrush_rank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `semrush_keyword_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `date_added` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `expiry_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL, `expiry_date2` datetime NOT NULL DEFAULT '2023-01-01 01:01:01', `status` int DEFAULT '0', `status_seo` int NOT NULL DEFAULT '0', `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`id`), UNIQUE KEY `domain` (`domain`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
                \DB::statement($sql);
            }
        }
        
    }
}
