<?php
namespace App\Helpers;

use simple_html_dom;

use App\Models\Domain;

class Helper {

    public static function isset($obj){
        return null !== $obj;
    }

    public static function getData($content) {
        include_once('simple_html_dom.php');
        $html = str_get_html('<table>'.$content.'</table>');
        // echo $html;die();
        foreach ($html->find('tbody',0)->find("tr") as $key1 => $section1) {
            $name = Helper::isset($section1->find('.expired-domains',1)) ? trim($section1->find('.expired-domains',1)->plaintext) : '';
            $source = Helper::isset($section1->find('.td_data_source a',0)) ? trim($section1->find('.td_data_source a',0)->href) : '';
            $tf = Helper::isset($section1->find('.td_majestic_tf',0)) ? trim($section1->find('.td_majestic_tf',0)->plaintext) : 0;
            $cf = Helper::isset($section1->find('.td_majestic_cf',0)) ? trim($section1->find('.td_majestic_cf',0)->plaintext) : 0;
            $bl = Helper::isset($section1->find('.td_majestic_bl',0)) ? trim($section1->find('.td_majestic_bl',0)->plaintext) : 0;
            $rd = Helper::isset($section1->find('.td_majestic_rd',0)) ? trim($section1->find('.td_majestic_rd',0)->plaintext) : 0;
            $languages = Helper::isset($section1->find('.td_languages',0)) ? trim($section1->find('.td_languages',0)->plaintext) : 0;
            $da = Helper::isset($section1->find('.td_moz_da',0)) ? trim($section1->find('.td_moz_da',0)->plaintext) : 0;
            $pa = Helper::isset($section1->find('.td_moz_pa',0)) ? trim($section1->find('.td_moz_pa',0)->plaintext) : 0;
            $age = Helper::isset($section1->find('.td_age',0)) ? trim($section1->find('.td_age',0)->plaintext) : 0;
            // $score = Helper::isset($section1->find('.td_sz_score a strong',0)) ? $section1->find('.td_sz_score a strong',0)->plaintext : $section1->find('.td_sz_score',0)->plaintext;
            $score = -1;
            $redirects = Helper::isset($section1->find('.td_redirects',0)) ? trim($section1->find('.td_redirects',0)->plaintext) : 0;
            $history = Helper::isset($section1->find('.td_active_history',0)) ? trim($section1->find('.td_active_history',0)->plaintext) : 0;
            $domain_drops = Helper::isset($section1->find('.td_domain_drops',0)) ? trim($section1->find('.td_domain_drops',0)->plaintext) : 0;
            $total_organic_results = Helper::isset($section1->find('.td_total_organic_results',0)) ? trim($section1->find('.td_total_organic_results',0)->plaintext) : 0;
            $semrush_traffic = Helper::isset($section1->find('.td_semrush_traffic',0)) ? trim($section1->find('.td_semrush_traffic',0)->plaintext) : 0;
            $semrush_rank = Helper::isset($section1->find('.td_semrush_rank',0)) ? trim($section1->find('.td_semrush_rank',0)->plaintext) : 0;
            $semrush_keyword_number = Helper::isset($section1->find('.td_semrush_keyword_number',0)) ? trim($section1->find('.td_semrush_keyword_number',0)->plaintext) : 0;
            $date_added = Helper::isset($section1->find('.td_date_added',0)) ? trim($section1->find('.td_date_added',0)->plaintext) : 0;
            $price = Helper::isset($section1->find('.td_price',0)) ? trim($section1->find('.td_price',0)->plaintext) : 0;
            $expiry_date = Helper::isset($section1->find('.td_expiry_date',0)) ? trim($section1->find('.td_expiry_date',0)->plaintext) : 0;

            $existed = Domain::where('domain', $name)->first();
            if($existed){
                $domain = \DB::table('domain2')->where('id', $existed->id)->update([
                    'domain' => $name,
                    'source' => $source,
                    'tf' => ($tf == '-') ? -1 : $tf,
                    'cf' => ($cf == '-') ? -1 : $cf,
                    'bl' => ($bl == '-') ? -1 : $bl,
                    'rd' => ($rd == '-') ? -1 : $rd,
                    'languages' => ($languages == '-') ? -1 : $languages,
                    'da' => ($da == '-') ? -1 : $da,
                    'pa' => ($pa == '-') ? -1 : $pa,
                    'age' => ($age == '-') ? -1 : $age,
                    'score' => ($score == '-') ? -1 : $score,
                    'redirects' => ($redirects == '-') ? -1 : $redirects,
                    'history' => ($history == '-') ? -1 : $history,
                    'domain_drops' => ($domain_drops == '-') ? -1 : $domain_drops,
                    'total_organic_results' => ($total_organic_results == '-') ? -1 : $total_organic_results,
                    'semrush_traffic' => ($semrush_traffic == '-') ? -1 : $semrush_traffic,
                    'semrush_rank' => ($semrush_rank == '-') ? -1 : $semrush_rank,
                    'semrush_keyword_number' => ($semrush_keyword_number == '-') ? -1 : $semrush_keyword_number,
                    'date_added' => date('Y-m-d H:i:s', strtotime($date_added)),
                    'price' => $price,
                    'expiry_date' => ($expiry_date != 'Available') ? date('Y-m-d H:i:s', strtotime($expiry_date)) : 'Available',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            }else{
                $domain = Domain::create([
                    'domain' => $name,
                    'source' => $source,
                    'tf' => ($tf == '-') ? -1 : $tf,
                    'cf' => ($cf == '-') ? -1 : $cf,
                    'bl' => ($bl == '-') ? -1 : $bl,
                    'rd' => ($rd == '-') ? -1 : $rd,
                    'languages' => ($languages == '-') ? -1 : $languages,
                    'da' => ($da == '-') ? -1 : $da,
                    'pa' => ($pa == '-') ? -1 : $pa,
                    'age' => ($age == '-') ? -1 : $age,
                    'score' => ($score == '-') ? -1 : $score,
                    'redirects' => ($redirects == '-') ? -1 : $redirects,
                    'history' => ($history == '-') ? -1 : $history,
                    'domain_drops' => ($domain_drops == '-') ? -1 : $domain_drops,
                    'total_organic_results' => ($total_organic_results == '-') ? -1 : $total_organic_results,
                    'semrush_traffic' => ($semrush_traffic == '-') ? -1 : $semrush_traffic,
                    'semrush_rank' => ($semrush_rank == '-') ? -1 : $semrush_rank,
                    'semrush_keyword_number' => ($semrush_keyword_number == '-') ? -1 : $semrush_keyword_number,
                    'date_added' => date('Y-m-d H:i:s', strtotime($date_added)),
                    'price' => $price,
                    'expiry_date' => ($expiry_date != 'Available') ? date('Y-m-d H:i:s', strtotime($expiry_date)) : 'Available',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            }
        }
    }

    public static function getData2($content) {
        include_once('simple_html_dom.php');
        // include_once(public_path('simple_html_dom.php'));
        $html = str_get_html('<table>'.$content.'</table>');
        // echo $html;die;
        // echo $html;die();
        foreach ($html->find("tr") as $key1 => $section1) {
            // echo $section1; die;
            if($html->find('td.views-field-title',$key1) == NULL) continue;
            $name = trim($html->find('td.views-field-title',$key1)->find('a', 0)->plaintext);
            $da = trim($html->find('td.views-field-field-moz-com-da',$key1)->plaintext);
            $pa = trim($html->find('td.views-field-field-moz-com-pa',$key1)->plaintext);
            $ref = trim($html->find('td.views-field-field-moz-ref-domains',$key1)->plaintext);
            $backlinks = trim($html->find('td.views-field-field-total-backlinks',$key1)->plaintext);
            $trust = trim($html->find('td.views-field-field-trust-flow',$key1)->plaintext);
            $citation = trim($html->find('td.views-field-field-citation-flow',$key1)->plaintext);
            $adresses = trim($html->find('td.views-field-field-ip-adresses',$key1)->plaintext);
            $referring = trim($html->find('td.views-field-field-referring-domains-',$key1)->plaintext);
            $dr = trim($html->find('td.views-field-field-ahrefs-dr',$key1)->plaintext);
            $ur = trim($html->find('td.views-field-field-ahrefs-ur',$key1)->plaintext);
            $history = trim($html->find('td.views-field-field-history',$key1)->plaintext);
            $registrar = trim($html->find('td.views-field-field-registrar',$key1)->plaintext);
            $price = trim($html->find('td.views-field-commerce-price',$key1)->plaintext);

            $existed = Domain::where('name', $name)->first();
            if($existed){
                $domain = \DB::table('domains')->where('id', $existed->id)->update([
                    'name' => $name,
                    'da' => $da,
                    'pa' => $pa,
                    'ref' => $ref,
                    'backlinks' => $backlinks,
                    'trust' => $trust,
                    'citation' => $citation,
                    'adresses' => $adresses,
                    'referring' => $referring,
                    'dr' => $dr,
                    'ur' => $ur,
                    'history' => $history,
                    'registrar' => $registrar,
                    'price' => $price,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            }else{
                $domain = Domain::create([
                    'name' => $name,
                    'da' => $da,
                    'pa' => $pa,
                    'ref' => $ref,
                    'backlinks' => $backlinks,
                    'trust' => $trust,
                    'citation' => $citation,
                    'adresses' => $adresses,
                    'referring' => $referring,
                    'dr' => $dr,
                    'ur' => $ur,
                    'history' => $history,
                    'registrar' => $registrar,
                    'price' => $price,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            }
        }
    }

    public static function getData3($content) {
        include_once('simple_html_dom.php');
        // include_once(public_path('simple_html_dom.php'));
        $html = str_get_html('<table>'.$content.'</table>');
        // echo $html;die;
        // echo $html;die();
        foreach ($html->find("tbody tr") as $key1 => $section1) {
            // echo $section1; die;
            // if($key1 == 0) continue;

            // name, da, rd = ree, dr, tf, cf, cate1, cate2, price
            if($section1->find('td',1) == NULL) continue;
            $name   = trim($section1->find('td',1)->find('span', 0)->plaintext);
            $da     = trim($section1->find('td',2)->plaintext);
            $ree    = trim($section1->find('td',3)->plaintext);
            $dr     = trim($section1->find('td',4)->plaintext);
            $tf     = trim($section1->find('td',5)->plaintext);
            $cf     = trim($section1->find('td',6)->plaintext);
            $cate1  = trim($section1->find('td',9)->plaintext);
            $cate2  = trim($section1->find('td',10)->plaintext);
            $price  = trim($section1->find('td',14)->plaintext);

            // dd($name, $da, $ree, $dr, $tf, $cf, $cate1, $cate2, $price);
            $existed = Domain::where('name', $name)->first();
            if($existed){
                $domain = \DB::table('domains')->where('id', $existed->id)->update([
                    'name' => $name,
                    'da' => $da,
                    'ree' => $ree,
                    'dr' => $dr,
                    'tf' => $tf,
                    'cf' => $cf,
                    'cate1' => $cate1,
                    'cate2' => $cate2,
                    'price' => $price,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            }else{
                $domain = Domain::create([
                    'name' => $name,
                    'da' => $da,
                    'ree' => $ree,
                    'dr' => $dr,
                    'tf' => $tf,
                    'cf' => $cf,
                    'cate1' => $cate1,
                    'cate2' => $cate2,
                    'price' => $price,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            }
        }
    }

    static function test($str) {
        if($str === 'registered') {
            return 0;
        }
        return 1;
    }
}
