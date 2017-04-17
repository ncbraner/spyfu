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
    <div class="flex flex-center">
<h1>THE KEYWORD MODIFICATION PAGE</h1>
    </div>

    <div class="flex">

      <div class="leftside">
        <?php  include('app/templates/leftnav.php'); 
                ?>
      </div>



      <div class="main">

  <div class="">
    <h3>Display keywords tied to URL</H3>
    <p>Use the form below to populate the keyword window. This is all the keywords within the database tied to the URL you input.</p>
    <form action=<?php echo $actionLink ?> method="POST">
      <div class="form-group">
        <Strong>What is the URL you want to see Keywords for.</strong> <br/>
        <p></p>
        <label for="site">Site Url</label>
        <input type="text" name="url_keywords" class="form-control" id="site-url" placeholder="example.com">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </form>
  </div>

  <div>
    <H3> Time to edit the keywords! </h3>
    <form action=<?php echo $actionLink ?> method="POST">


      <strong> Step 1 </strong> <br>
      <p>  </p>

      <strong>What is the URL you want to edit.</strong> <br/>
      <p> </p>
      <label for="site">Site Url</label>
      <input type="text" name="url_keywords" class="form-control" id="site-url" placeholder="example.com">

<br>
<p>  </p>

      <strong>Step 2</strong> <br />
      <strong> Do you want to add or delete a Keyword </strong>

      <input type="radio" name="Add" value="male"> Add
      <input type="radio" name="Delete" value="female"> Delete<br>
     




  </div>

  <p>  </p>

  <strong>Step 3</strong> <br>


<p>  </p>

  <Strong>What keyword do you want to edit?.</strong> <br>
  <p>  </p>
  <label for="site">KEYWORD</label>
  <input type="text" name="keyword_edit" class="form-control" id="site-url" placeholder="example.com">
  <button type="submit" class="btn btn-default">Submit</button>


  </form>

</div>

  
  <div class="rightside">
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
</div>


</body>

</html>