<?php

namespace Ecreativeworks\Spyfu\models;

class Url {


    public static function saveUrl($db, $url){
           
        
        try{
            $result =  $db->query("INSERT INTO company_url  (company_url) VALUES ('$url')");
            echo "<p style= background-color:green;>" ;
            print_r($url . " Added successfully" );
            echo "</p >" ;
        }
        catch(\PDOException $e){
          //  echo $e->getMessage();
         
         echo "<p style= background-color:red;>" ;
        print_r($url . " Already exsist" );
         echo "</p >" ;
           
        }
    }


    public static function deleteUrl($db, $url){
       
            
           $result =  $db->exec("DELETE FROM company_url   WHERE  (company_url)=('$url')");
          echo "<p style= background-color:green;>" ;
            print_r($url . "Was deleted successfully");
          echo "</p >" ;
        if($result !== true){
             echo "<p style= background-color:green;>" ;
            echo "No matching URL to delete!";
             echo "</p >" ;
        }
    }

}