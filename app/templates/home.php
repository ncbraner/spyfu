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
      <h1 class="flex-center">Welcome to The Ecreativeworks Spyfu Automatic keyword Report Generator</h1>
    </div>

    <div class="flex">

      <div class="leftside">
        <?php  include('app/templates/leftnav.php'); 
    
        ?>
        
      </div>
      <div class="main">
<h2>What does it do?</h2>
 <p class="content">The Spyfu automated website (spyfu.ecreativworks.com) is a intermediary between Spyfu.com and Google sheets/data studio. <br>
 The website take data that you have given it and then submits that to spyfu.  The current data is only a url and keyword association. <br>
 A good example would be  URL: Ebay.com   Keyword: Online auctions. At the current time the only data being stored is the URL, Keyword, Rank, and date.
  There are many other options however it was indicated that this is all we need at the current time.  </p>
<h2>Then what happens?</h2>
 <p class="content"></p> After the the website runs its reports  those reports are then sent to google sheets ( associated with the seo account) and this process is semi automatic. 
  Every month someone ( one person would be best) will need to import data.  We are working on automating that process. <br>
 This step, although adding some complexity to the process was needed to do the calculations to make the reports flexible. <br></p>
 
 <p>The file inside google sheets is called "SEO keyword rankings".  Inside of google sheets there is will be a sheet with all of the information that our site brought in. Once it is 
   inside of that sheet we calculate out all of the diffrent rank changes as needed. <strong>No one needs to be in the sheets!</strong>  I only say that due to the fact that if you mess 
   up a formula or the data,  the sheets could break and your report will not be correct.    </p>

<h2>Then where does it go?</h2>
<p>
After the data has been cacluated in google sheets it rolls off to Data studio.  This is all automated.  From here this is where you will bring in your reports.  From your reports you can 
roll down to keyword rankings page,  click on resources and attach your applicable google sheet.  This can be demonstrated.  
</p>

<h2>Whats this going to do for me?</h2>

<p>
  Up till this point you had to run between your keyworks rankings and your report and collect the data and calculate it as you went.  With this new app all that work is automated.  
  Early estimates is this will save you approimalty a week of work!  Thats pretty cool.  This time saving will only become larger as you gain more clients.
</p>

      </div>
      <div class="rightside">
        <h1></h1>
      </div>
    </div>




  </body>

  </html>