<?php
namespace Ecreativeworks\Spyfu\lib;
use Ecreativeworks\Spyfu\models\Keyword;

class Report {


    public static function generateReport($db){

        $stmt = $db->query("SELECT company_url FROM company_url" );
        
        while($r = $stmt->fetch()){
            Keyword::seoInsert($db, $r['company_url']);
            self::printReport($r['company_url'], date("m/d/Y"));
            set_time_limit(30);
        }
    }    

    public static function printReport($url, $date){
        echo "{$url}  Was posted on  {$date}  <br/>";
    }
    
}
