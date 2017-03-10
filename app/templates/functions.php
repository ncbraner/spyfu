<?php
require_once 'vendor/autoload.php';

use Carbon\Carbon;
use GuzzleHttp\Client;
use Ecreativeworks\Spyfu\lib\DB;
use Ecreativeworks\Spyfu\lib\SpyfuApi;

function runReport($db){


$stmt = $db->query("SELECT company_url FROM company_url" );

while($r = $stmt->fetch()){
    $url = $r['company_url'];
  
    seoInsert($db, $url);
    
    }
}




function saveUrl($db){
    if(isset($_POST['addUrl'])){
        $addUrl = $_POST['addUrl'];
    }
    
    if(isset ($addUrl)) {
        try{
            $result =  $db->query("INSERT INTO company_url  (company_url) VALUES ('$addUrl')");
            print_r($addUrl . " Added successfully" );
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die(123);
            header("Location: /spyfu?url={$addUrl}&error=true");
        }
    }
}


function deleteUrl($db){
    $deleteUrl = $_POST['deleteUrl'];
    
    if(isset ($deleteUrl)) {
       
        try{
            $result =  $db->exec("DELETE FROM company_url   WHERE  (company_url)=('$deleteUrl')");
            print_r($dleteUrl . "Was deleted successfully");
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die(123);
            header("Location: /spyfu?url={$deleteUrl}&error=true");
        }
    }
}






function seoInsert($db, $url){
  
    if(isset($_POST['url'])){
    $url = $_POST['url'];
    }
    

    
    
    
    
    
    
    $client = new Client();
    $api = new SpyfuApi($client);
    $result = $api->get("organic_kws", $url);
    
    $result = json_decode($result);
    $sql = 'INSERT INTO keyword_information
    (url,
    keyword,
    cpc,
    monthly_searches_local,
    monthly_searches_global,
    ranking_difficulty,
    rank,
    rank_change,
    post_date
    ) values(?, ?, ?, ?, ?, ?, ?, ?, ?)';
    
    $currentDate = Carbon::now('America/Chicago');
    $date = $currentDate;
 
    
    $stmt = $db->prepare($sql);
    
    
    array_map(function($result) use($stmt, $date, $url){
        $stmt->execute([
        $url,
        $result->term,
        $result->exact_cost_per_click,
        $result->exact_local_monthly_search_volume,
        $result->exact_global_monthly_search_volume,
        $result->seo_difficulty,
        $result->position,
        $result->url_position_change,
        $date
        ]);
    }, $result);
    
    $numberReturned = count($result);
    
}



?>