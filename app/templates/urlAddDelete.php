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
    <link rel="stylesheet" type="text/css" href="../templates/style.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="/spyfu/app/templates/javascript.js"></script>


  </head>

  <body>















    <?php
$actionLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>


      <div class="flex flex-right header">
        <?php  include('app/templates/header.php'); ?>

      </div>
      <div class="flex flex-column flex-center">
       <div>
         <h1>ADD AND DELETE URLS</h1>
       </div> 
        <strong>
           As the title states, this is where we are adding new URLS.  When you get a new client to ecw. Go ahead and add them.  Dont worry, you can not add the same URL twice.  Likewise go ahead and delete any client we ae not doing seo work for anymore. You also can not delete one more than once (obviously)
        </strong>
       
        
      </div>

      <div class="flex">
          

        <div class="leftside">
          <?php  include('app/templates/leftnav.php');
?>
        </div>



        <div class="main flex">
           

 
     <div class="addUrl">


<div >
      <h1>Enter the url you want to add</h1>

      <form action="" method="post">
        Company URL:
        <input type="text" name="addUrl">
        <br>

        <input type="submit" value="Submit"> <br>
        <p>
        <?php
if(isset($_POST['addUrl'])){
    echo "rred";
   }
      ?>
      </p>
      
      

      </form>
     
    </div>
   

  <div >
      <h1>Enter the url you want to Delete</h1>
      <form action="" method="post">
        Company URL:
        <input type="text" name="deleteUrl">
        <br>
        <input type="submit" value="Submit">
      </form>
  
      
    
    </div>




       
       
       
       
       </div>
       
        </div>


        <div class="rightside">


        </div>

</div>
  </body>

  </html>