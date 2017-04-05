<?php
namespace Ecreativeworks\Spyfu\models;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Ecreativeworks\Spyfu\lib\DB;
use Ecreativeworks\Spyfu\lib\SpyfuApi;



class Keyword {

    public static function seoInsert($db, $url){
        $client = new Client();
        $api = new SpyfuApi($client);
        $result = $api->get("organic_kws", $url);
        
        $result = json_decode($result);
        $sql = 'INSERT INTO keyword_information
        (url,
        keyword,      
        rank,      
        post_date
        ) values(?, ?, ?, ?)';
        
        $currentDate = Carbon::now('America/Chicago');
        
        $date = date("m/Y");
        
        
        $stmt = $db->prepare($sql);
        
        
        array_map(function($result) use($stmt, $date, $url){
            $stmt->execute([
            $url,
            $result->term,           
            $result->position,            
            $date
            ]);
        }, $result);
        
        $numberReturned = count($result);
        
    }

}
