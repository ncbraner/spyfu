<?php

require_once 'vendor/autoload.php';

use Carbon\Carbon;
use GuzzleHttp\Client;
use Ecreativeworks\Spyfu\lib\DB;
use Ecreativeworks\Spyfu\lib\SpyfuApi;
use Ecreativeworks\Spyfu\lib\Report;
Use Ecreativeworks\Spyfu\models\Url;
use Ecreativeworks\Spyfu\models\Keyword;
use Ecreativeworks\Spyfu\lib\databaseFunctions;


//setup enviroment file from .env
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

//setup db
$db = DB::getConnection();

if( strpos($_SERVER['REQUEST_URI'], 'add-delete') !== false){
   include('app/templates/adddelete.php');
  
}elseif(strpos($_SERVER['REQUEST_URI'], 'manual-report') !== false){
   include('app/templates/manualreport.php');
}elseif(strpos($_SERVER['REQUEST_URI'], 'home') !== false){
    include('app/templates/home.php');

}elseif(strpos($_SERVER['REQUEST_URI'], 'add-url') !== false){
    include('app/templates/urlAddDelete.php');

}elseif(strpos($_SERVER['REQUEST_URI'], 'manual-report') !== false){
    include('app/templates/manualreport.php');


}elseif(!isset($url)){
   
    include('app/templates/home.php');
}






//  DELETING KEYWORDS

if(isset($_POST['url_keywords'],$_POST['Delete'],$_POST['keyword_edit'] )){
   
$id =  databaseFunctions::urlID($db, $_POST['url_keywords']);

Keyword::deleteKeywords($db, $id, $_POST['Delete'], $_POST['keyword_edit']);

}


//ADDING KEYWORDS

if(isset($_POST['url_keywords'],$_POST['Add'],$_POST['keyword_edit'] )){



$id =  databaseFunctions::urlID($db, $_POST['url_keywords']);

Keyword::addKeywords($db, $id, $_POST['Add'], $_POST['keyword_edit']);


}



// inserts single url into the keyword_information table

if(isset($_POST['url'])){
    $url = $_POST['url'];

Keyword::seoInsert($db, $url);
    
}


//saves url to the Company_url table
if(isset($_POST['addUrl'])){
    Url::saveUrl($db, $_POST['addUrl']);
   }


//Deletes url from Company_url table
if(isset($_POST['deleteUrl'])){
     Url::deleteUrl($db, $_POST['deleteUrl']);
}


// takes urs from company_url data and runs through report
if(isset($_POST['reportYes'])){
    
    Report::generateReport($db);
    
}

//Set back to index if report button pressed accidently
if(isset($_POST['reportNo'])){
    
    
    header("Location: /spyfu");
}




//header("Location: /spyfu");