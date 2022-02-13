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
                    <form id="survey-form" action="surveys/add" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Enter name" minlength=3 maxlength=110 autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="name" name="company" class="form-control" placeholder="Enter company" minlength=3 maxlength=110 autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" minlength=10 maxlength=55 autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="phone" name="phone" class="form-control" placeholder="Enter phone" pattern="[+,0][1-9]{1}[0-9]{1,2}[0-9]{4,12}" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Age (optional)</label>
                            <input type="number" name="age" class="form-control" placeholder="Enter age" onkeyup="if(parseInt(this.value)>120){ this.value =120; return false; } else if(this.value < 0) { this.value =1; return false; }" autocomplete="off">
                        </div>                 
                        <div class="form-group">
                          <label for="comment">Any comments or suggestions? (Optional)</label>
                          <textarea class="form-control" name="comment" rows="5" placeholder= "Enter your comment here"></textarea>
                        </div>
                         <div class="form-check mb-3">
                          <label class="form-check-label" for="aggrement">
                            <input type="checkbox" name="aggrement" class="form-check-input" id="aggrement" value="1">Do you aggree to submit your information?
                          </label>
                        </div>
                        <input type="submit" class="btn btn-success" value="SUMBIT" style="width: 100%;" disabled/>
                    </form>
                </div>
            </div>
        </div>
        <!-- Script -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            const SERVER = {
                hostname: "http://localhost:3000",
                prefix: ["api", "auth"]
            };

            $('#aggrement').change(function () {
                if ($(this).is(":checked")) {
                    $('input[type=submit]').attr("disabled", false);    
                } else {
                    $('input[type=submit]').attr("disabled", true);
                }
            });

            $('#survey-form').submit(function (e) {
                event.preventDefault();
                // get form data
                const action = $(this).attr('action');
                const type = $(this).attr('method');
                const data = $(this).serialize();
                const url = `${SERVER.hostname}/${SERVER.prefix[0]}/${action}`;
                // submit data
                $.ajax({
                    url: url,
                    type: type,
                    data: data,
                    success: function (reponse) {
                        console.log("reponse ", reponse);
                        const { data: result, callbackUrl } = reponse;
                        // Save data to sessionStorage
                        sessionStorage.setItem("token", `${result[0].token}`);
                        window.location.replace(`${callbackUrl}/${result[0].token}`);
                    },
                    error: function (error) {
                        console.log("Error ", error);
                    },
                });
            });
        </script>
    </body>
</html>
