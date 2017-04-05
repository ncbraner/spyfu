<!DOCTYPE html>
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
    <div class="container flex flex-center">
      <?php
$actionLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
     
     
     
     <!--end hidden content -->
     

     <div class="toolbar flex flex-center">
         <div class="addUrl">
        <button class="addurlbtn" id="add" onclick="appearAdd()">
          <div class="btnInner">
            <h1>Click here to add a client URL</h1>
          </div>
        </button>
      </div>
         <div class="addUrl">
        <button class="addurlbtn" id="add" onclick="appearAdd()">
          <div class="btnInner">
            <h1>Click here to add a client URL</h1>
          </div>
        </button>
      </div>
     </div>
     
        <form action=<?php echo $actionLink ?> method="POST">

          <div class="form-group">
            <h2>Run a URL one time only.</h2>
            <label for="site">Site Url</label>
            <input type="text" name="url" class="form-control" id="site-url" placeholder="example.com">
            <button type="submit" class="btn btn-default">Submit</button>

          </div>

        </form>


    </div>

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