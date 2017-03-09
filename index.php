<?php

require_once 'vendor/autoload.php';

use Carbon\Carbon;
use GuzzleHttp\Client;
use Ecreativeworks\Spyfu\lib\DB;
use Ecreativeworks\Spyfu\lib\SpyfuApi;

//setup enviroment file from .env
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

//setup db
$db = DB::getConnection();

//returns home page
if(!isset($url)){
    include('app/templates/home.php');
}




// inserts single url into the keyword_information table

if(isset($_POST['url'])){
    seoInsert($db);
}


//saves url to the Company_url table
if(isset($_POST['addUrl'])){
    saveUrl($db);
    $addUrl = $_POST['addUrl'];
}


//Deletes url from Company_url table
if(isset($_POST['deleteUrl'])){
    deleteUrl($db);
    echo "pre1";
    $deleteUrl = $_POST['deleteUrl'];
}

if(isset($_POST['reportYes'])){
    
  runReport($db);  
    // echo "musta failed";
}
if(isset($_POST['reportNo'])){
    
    
    header("Location: /spyfu");
}





function runReport($db){


$stmt = $db->prepare("SELECT url FROM company_url WHERE id > 0");

$stmt = $stmt->execute();



print_r($stmt[0]);


// $stmt = $stmt->execute();

// print_r($stmt);

  }










function saveUrl($db){
    if(isset($_POST['addUrl'])){
        $addUrl = $_POST['addUrl'];
    }
    
    if(isset ($addUrl)) {
        try{
            $result =  $db->query("INSERT INTO company_url  (company_url) VALUES ('$addUrl')");
            print_r($result);
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
        echo $deleteUrl;
        try{
            $result =  $db->exec("DELETE FROM company_url   WHERE  (company_url)=('$deleteUrl')");
            print_r($result);
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die(123);
            header("Location: /spyfu?url={$deleteUrl}&error=true");
        }
    }
}





function seoInsert($db, $row){
    echo "1234";
    if(isset($_POST['url'])){
    $url = $_POST['url'];
    }
    $url = $row;

    echo $url;
    
    
    
    
    
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
    //echo $date; die();
    
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
    echo "the end";
}












//header("Location: /spyfu");