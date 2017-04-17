<?php
Namespace Ecreativeworks\Spyfu\lib;

require_once 'vendor/autoload.php';

use Carbon\Carbon;
use GuzzleHttp\Client;
use Ecreativeworks\Spyfu\lib\DB;
use Ecreativeworks\Spyfu\lib\SpyfuApi;
use Ecreativeworks\Spyfu\lib\Report;
Use Ecreativeworks\Spyfu\models\Url;
use Ecreativeworks\Spyfu\models\Keyword;
use PDO;




class databaseFunctions{
    
    public static function urlID($db, $url) {
        
        $wrds =
        'SELECT  id
        FROM
        company_url
        WHERE
        company_url = :url';
        $stmt = $db->prepare($wrds);
        $stmt->bindParam(':url', $url, PDO::PARAM_STR);
        $stmt->execute();
        while( $urlkeys = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            $id = $urlkeys[0]['id'];
            return $id;
        }
    }
    
    
    
    
    
    public static function keyword($db, $id) {
        
        $wrds =
        'SELECT  keyword
        FROM
        url_keywords
        WHERE
        url_keywords.url_id = :id';
        $stmt = $db->prepare($wrds);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $keywords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // end of gather
        
        //  loop over keywords and record data into database
        foreach($keywords as $keyword)
        {
            foreach($keyword as $ind=>$word){
                echo $word ."<br />";
            };
        }
    }



 public static function keywordTerm($db, $id) {
        
        $wrds =
        'SELECT  keyword
        FROM
        url_keywords
        WHERE
        url_keywords.url_id = :id';
        $stmt = $db->prepare($wrds);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $keywords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // end of gather
        
      return $keywords;
        }

public static function deleteKeywords($db, $id, $delete, $keyword){

    $delete=
    'DELETE 
    FROM
    url_keywords
    WHERE
    url_id = :id
    and
    keyword = :keyword';
    $stmt = $db->prepare($delete);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
    $stmt->execute();

     echo "<p style= background-color:green;>" ;
            print_r($keyword . " Deleted successfully please submit the page to update the keyword list" );
            echo "</p >" ;
}

public static function addKeywords($db, $id, $add, $keyword){
    
//$keyword = " '$keyword' ";
 
$add =
   'INSERT INTO
   url_keywords(url_id, keyword)
   VALUES 
   (:id, :keyword)';
    $stmt = $db->prepare($add);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
    $stmt->execute();

     echo "<p style= background-color:green;>" ;
            print_r($keyword . " added successfully please submit the page to update the keyword list" );
            echo "</p >" ;
}







    }


