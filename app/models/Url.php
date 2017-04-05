<?php

namespace Ecreativeworks\Spyfu\models;

class Url {


    public static function saveUrl($db, $url){
           
        
        try{
            $result =  $db->query("INSERT INTO company_url  (company_url) VALUES ('$url')");
            print_r($url . " Added successfully" );
        }
        catch(\PDOException $e){
            echo $e->getMessage();
         
            header("Location: /spyfu?url={$url}&error=true");
        }
    }


    public static function deleteUrl($db, $url){
       
            
           $result =  $db->exec("DELETE FROM company_url   WHERE  (company_url)=('$url')");
            print_r($url . "Was deleted successfully");
        
        if($resul !== true){
            echo "No matching URL to delete!";
        }
    }

}