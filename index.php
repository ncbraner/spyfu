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

if(isset($_POST['url'])){
    $url = $_POST['url'];
}
if(!isset($url)){
    include('app/templates/home.php');
    die();
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

header("Location: /spyfu");
