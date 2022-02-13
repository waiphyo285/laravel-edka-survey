<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sample Survey Form</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="/style/home.css">
    </head>
    <body>
        <div class="container">
            <header class="py-3">
                <h1 id= "title">Sample Survey Form</h1>
                <p id= "description" style="color: white;">Thank you for taking the time to help us</p>
            </header>
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-3 mb-5">
                   <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <p>You successfully submitted your information with token number 
                             <b>#{{$token}}</b> to our organization. Thank you.
                        </p>
                        <hr>
                        <a href="/" class="btn btn-success" id="goback">GO BACK</a>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Get saved data from sessionStorage
        const token = sessionStorage.getItem("token");
        (token) 
            ?   setTimeout(function() {
                    window.location.replace(`/`);
                    sessionStorage.clear();
                }, 10000) 
            :   window.location.replace(`/`);
        
        $("#goback").on("click", function() {
            // Remove all saved data from sessionStorage
            sessionStorage.clear();
        });
    </script>
    </body>
</html>
