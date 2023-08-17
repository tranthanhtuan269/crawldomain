<?php
namespace App\Helpers;

use simple_html_dom;

class Helper {

    public static function getData($content) {
        include_once('simple_html_dom.php');
        // include_once(public_path('simple_html_dom.php'));
        $html = str_get_html('<table>'.$content.'</table>');
        echo $html;
        foreach ($html->find("tr") as $key1 => $section1) {
            // echo $section1; die;

            foreach ($section1->find("td") as $key2 => $section2) {
                dd($key2);
                if($key2 == 0){
                    echo $section2->innerText();die;
                }
            }
        }
    }
}
