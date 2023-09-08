<?php
namespace App\Helpers;

use simple_html_dom;

use App\Models\Domain;

class Helper {

    public static function getData($content) {
        include_once('simple_html_dom.php');
        $html = str_get_html('<table>'.$content.'</table>');
        // echo $html;die();
        foreach ($html->find('tbody',0)->find("tr") as $key1 => $section1) {
            $name = $section1->find('td.field_domain',0)->find('a', 0)->plaintext;
            $LE = $section1->find('td.field_length',0)->plaintext;
            $BL = $section1->find('td.field_bl',0)->find('a',0)->plaintext;
            // dd($BL);
            $DP = $section1->find('td.field_domainpop',0)->plaintext;
            $WBY = $section1->find('td.field_creationdate',0)->plaintext;
            $ABY = $section1->find('td.field_abirth',0)->plaintext;
            $ACR = $section1->find('td.field_aentries',0)->plaintext;
            $MMGR = $section1->find('td.field_majestic_globalrank',0)->plaintext;
            $Dmoz = $section1->find('td.field_dmoz',0)->plaintext;
            $Reg = $section1->find('td.field_statustld_registered',0)->plaintext;

            $C = Helper::test($section1->find('td.field_statuscom',0)->find('span',0)->plaintext);
            $N = Helper::test($section1->find('td.field_statusnet',0)->find('span',0)->plaintext);
            $O = Helper::test($section1->find('td.field_statusorg',0)->find('span',0)->plaintext);
            $B = Helper::test($section1->find('td.field_statusbiz',0)->find('span',0)->plaintext);
            $I = Helper::test($section1->find('td.field_statusinfo',0)->find('span',0)->plaintext);
            $D = Helper::test($section1->find('td.field_statusde',0)->find('span',0)->plaintext);

            $addDate = $section1->find('td.field_adddate',0)->plaintext;
            $RTD = $section1->find('td.field_related_cnobi',0)->plaintext;
            $WPL = $section1->find('td.field_wikipedia_links',0)->plaintext;
            $dropped = $section1->find('td.field_changes',0)->plaintext;
            // $status = Helper::test($section1->find('td.field_whois',0)->find('span',0)->plaintext);

            $existed = Domain::where('name', $name)->first();
            if($existed){
                $domain = \DB::table('domains')->where('id', $existed->id)->update([
                    'name' => $name,
                    'ree' => $BL,
                    'dp' => $DP,
                    'aby' => $ABY == '-' ? -1 : $ABY,
                    'acr' => $ACR,
                    'add_date' => $addDate,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            }else{
                $domain = Domain::create([
                    'name' => $name,
                    'ree' => $BL,
                    'dp' => $DP,
                    'aby' => $ABY == '-' ? -1 : $ABY,
                    'acr' => $ACR,
                    'add_date' => $addDate,
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
