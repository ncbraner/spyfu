<?php

require_once 'vendor/autoload.php';

use Carbon\Carbon;
use GuzzleHttp\Client;
use Ecreativeworks\Spyfu\lib\DB;
use Ecreativeworks\Spyfu\lib\SpyfuApi;
include("/app/templates/functions.php");

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
    
    $deleteUrl = $_POST['deleteUrl'];
}


// takes urs from company_url data and runs through report
if(isset($_POST['reportYes'])){
    
    runReport($db);
    
}

//Set back to index if report button pressed accidently
if(isset($_POST['reportNo'])){
    
    
    header("Location: /spyfu");
}

//header("Location: /spyfu");