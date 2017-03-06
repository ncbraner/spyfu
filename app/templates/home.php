<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <title>Ecreativeworks</title>
</head>

<body>
    <style>
    .flex{
        display:flex;
    }
    .flex-center{
        justify-content:center;
        align-items:center;
    }
    form input{
        height:20px;
    }

    </style>
    <div class="container flex flex-center">
        <form action="/spyfu/" method="POST">
            <form>
                <div class="form-group">
                    <h2>Please enter your sites url</h2>
                    <label for="site">Site Url</label>
                    <input type="text" name="url" class="form-control" id="site-url" placeholder="example.com"><button type="submit" class="btn btn-default">Submit</button>
                    
                </div>
        </form>


    </div>
</body>

</html>