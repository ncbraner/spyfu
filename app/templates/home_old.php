<?php
use Carbon\Carbon;
use GuzzleHttp\Client;
use Ecreativeworks\Spyfu\lib\DB;
use Ecreativeworks\Spyfu\lib\SpyfuApi;
use Ecreativeworks\Spyfu\lib\Report;
Use Ecreativeworks\Spyfu\models\Url;
use Ecreativeworks\Spyfu\models\Keyword;
?>


<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <title>Ecreativeworks</title>
    <link rel="stylesheet" type="text/css" href="<?php echo getenv(" APPURL ") ?>app/templates/style.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="/spyfu/app/templates/javascript.js"></script>


  </head>
  <body>
<!--hidden popup-->

  <?php if(isset($_GET["error"])){
    echo "URL {$_GET['url']} Already in Database";
}
?>

    <!--ADD URL FORM-->
    <div id="popupAdd" class="popupAdd">
      <h1>Enter the url you want to add</h1>

      <form action="" method="post">
        Company URL:
        <input type="text" name="addUrl">
        <br>

        <input type="submit" value="Submit">
      </form>
    </div>



    <!--Run Report-->
    <div id="popupReport" class="popupReport hidden">
      <h1>Do you want to run report</h1>

      <form action="" method="post">

        <input type="submit" name="reportYes" value="yes">
        <br>
        <input type="submit" name="reportNo" value="no">

      </form>
    </div>



    <!--Delete URL -->

    <div id="popupDelete" class="popupDelete">
      <h1>Enter the url you want to Delete</h1>
      <form action="" method="post">
        Company URL:
        <input type="text" name="deleteUrl">
        <br>
        <input type="submit" value="Submit">
      </form>
    </div>
   
   
<div class="toolbar flex flextop  ">
     <?php
            $actionLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      ?>
     






 <div class="">
   <strong>Step 1</strong>

<form action=<?php echo $actionLink ?> method="POST">
    <div class="form-group">
      <h2>What is the URL you want to see Keywords for.</h2>
      <label for="site">Site Url</label>
      <input type="text" name="url_keywords" class="form-control" id="site-url" placeholder="example.com">
      <button type="submit" class="btn btn-default">Submit</button>
</form>

  <form action=<?php echo $actionLink ?> method="POST">
    <div class="form-group">
      <h2>What is the URL you want to see Keywords for.</h2>
      <label for="site">Site Url</label>
      <input type="text" name="url_keywords" class="form-control" id="site-url" placeholder="example.com">
     

      <div>
        <p>
          <?php 
        if(isset($_POST['url_keywords'])){
          $changeUrl=$_POST['url_keywords'];
        echo "Your Current URL is" . " ".  $_POST['url_keywords'];} ?>
        </p>
      </div>

      <div>
        
          <p>
        <strong>Step 2</strong> <br />
        Do you want to add or delete a Keyword 
          
            <input type="radio" name="Add" value="male"> Add
            <input type="radio" name="Delete" value="female"> Delete<br>
</p>
         
          <?php 
        if(isset($_POST['Add']) || isset($_POST['Delete'])){
          $changeUrl=$_POST['url_keywords'];
        echo "Your Current URL is" . " ".  $_POST['url_keywords'];} ?>
        </p>
      
        <strong>Step 3</strong>
        
       
   
      <h2>What keyword do you want to edit?.</h2>
      <label for="site">Site Url</label>
      <input type="text" name="keyword_edit" class="form-control" id="site-url" placeholder="example.com">
      <button type="submit" class="btn btn-default">Submit</button>
</form>
        <?php 
        if(isset($_POST['keyword_edit'])){
          $changeUrl=$_POST['url_keywords'];
        echo "Your Current URL is" . " ".  $_POST['url_keywords'];} ?>
        </p>
      </div>

    </div>

  </form>
</div>



<div>
<h1>Keywords</h1>
  <div class="scrollbox">
   
        <?php
        // prints keywords for the entered URL
      if(isset($_POST['url_keywords'])){
    
     Keyword::printKeywords($db, $_POST['url_keywords']);
      }

      //end print keywords
            ?>


          
  </div>
  </div>
</div>


   
   
    <div class="container flex flex-center">
      <?php
$actionLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
     
     
     
     <!--end hidden content -->
     

 

            <form action=<?php echo $actionLink ?> method="POST">

          <div class="form-group">
            <h2>Run a URL one time only.</h2>
            <label for="site">Site Url</label>
            <input type="text" name="url" class="form-control" id="site-url" placeholder="example.com">
            <button type="submit" class="btn btn-default">Submit</button>

          </div>

        </form>


   

    </div>

    <div id="hide" class="addDelete flex flex-center">

      <div class="addUrl">
        <button class="addurlbtn" id="add" onclick="appearAdd()">
          <div class="btnInner">
            <h1>Click here to add a client URL</h1>
          </div>
        </button>
      </div>

      <div class="monthlyReport ">
        <button class="monthlyReportBtn" id="report" onclick="appearReport()">
          <div class="btnInner">
            <h1>Monthly Report</h1>
          </div>
        </button>
      </div>


      <div class="deleteurl" id="delete" onclick="appearDelete()">
        <button class="deleteurlbtn ">
          <div class="btnInner">
            <h1>Click here to delete a client URL</h1>
          </div>

        </button>
      </div>
    </div>
    </body>
    </html>