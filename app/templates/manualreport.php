<?php
use Carbon\Carbon;
use GuzzleHttp\Client;
use Ecreativeworks\Spyfu\lib\DB;
use Ecreativeworks\Spyfu\lib\SpyfuApi;
use Ecreativeworks\Spyfu\lib\Report;
Use Ecreativeworks\Spyfu\models\Url;
use Ecreativeworks\Spyfu\models\Keyword;
?>



  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <title>Ecreativeworks</title>
    <link rel="stylesheet" type="text/css" href="/spyfu/app/templates/style.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="/spyfu/app/templates/javascript.js"></script>


  </head>

  <body>
<div class="flex flex-right header">
   <?php  include('app/templates/header.php'); ?>
    
</div>
    <div class="flex flex-center">
      <h1 class="flex-center">Run a manual report!</h1>
    </div>

    <div class="flex">

      <div class="leftside">
        <?php  include('app/templates/leftnav.php'); 
    
        ?>
        
      </div>
      <div class="main">

<div >
      <h1>Do you want to run report</h1>

      <form action="" method="post">

        <input type="submit" name="reportYes" value="yes">
        <br>
        <input type="submit" name="reportNo" value="no">

      </form>
    </div>

      </div>
      <div class="rightside">
        <h1></h1>
      </div>
    </div>




  </body>

  </html>














