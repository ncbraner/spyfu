<?php

require_once 'vendor/autoload.php';

use Carbon\Carbon;
use GuzzleHttp\Client;
use Ecreativeworks\Spyfu\lib\DB;
use Ecreativeworks\Spyfu\lib\SpyfuApi;
use Ecreativeworks\Spyfu\lib\Report;
Use Ecreativeworks\Spyfu\models\Url;
use Ecreativeworks\Spyfu\models\Keyword;


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