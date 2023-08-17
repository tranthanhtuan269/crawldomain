<?php
namespace App\Helpers;

use simple_html_dom;

class Helper {

    public static function getData($content) {
        include_once('simple_html_dom.php');
        // include_once(public_path('simple_html_dom.php'));
        $html = str_get_html('<table>'.$content.'</table>');
        // echo $html;die();
        foreach ($html->find('tbody',0)->find("tr") as $key1 => $section1) {
            // echo $section1; die;

            $name = $section1->find('td.field_domain',0)->find('a', 0)->plaintext;
            $link = $section1->find('td.field_domain',0)->find('a', 0)->href;
            $LE = $section1->find('td.field_length',0)->plaintext;
            $BL = $section1->find('td.field_bl',0)->plaintext;
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
            dd($C, $N,$O, $B, $I, $D);

            $addDate = $section1->find('td.field_adddate',0)->plaintext;
            $RTD = $section1->find('td.field_related_cnobi',0)->plaintext;
            $WPL = $section1->find('td.field_wikipedia_links',0)->plaintext;
            $dropped = $section1->find('td.field_changes',0)->plaintext;
            $status = Helper::test($section1->find('td.field_whois',0)->find('span',0)->plaintext);

        }

    }

    static function test($str) {
        if($str === 'registered') {
            return 0;
        }
        return 1;
    }
}
