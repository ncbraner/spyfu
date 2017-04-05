<?php
namespace Ecreativeworks\Spyfu\models;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Ecreativeworks\Spyfu\lib\DB;
use Ecreativeworks\Spyfu\lib\SpyfuApi;
use PDO;


class Keyword {
    
    
    
    public static function seoInsert($db, $url){
        $client = new Client();
        $api = new SpyfuApi($client);

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
            }
           

            print_R($url);
            print_r($id);
    
        
        //Gather keywords per url
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
                $term=$word;
            };
            
      
        
            
            
            
            $result = $api->get("organic_kws", $url, $term);
            
            $result = json_decode($result);
            
            echo '<pre>';
            print_r($result);
            echo '</pre>';
            
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
            $date = date("m/d/Y");
            
            
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
        
    }
};