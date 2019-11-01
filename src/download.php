<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'">-->


        <link rel="stylesheet" href="../public/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public/css/main.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="h-100 row align-items-center">
            <div class="col d-flex justify-content-center">
                <form action="#" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="token">Please enter your token:</label>
                        <input type="text" class="form-control" id="token" name="filetoken" placeholder="Token" pattern="^[0-9A-Za-z]{6}$" required>
                        <small id="tokenHelpBlock" class="form-text text-muted">
                            The token consists of the following: <br/>
                            <ul>
                                <li>Exactly 6 characters.</li>
                                <li>Upper- or lowercase characters.</li>
                                <li>Numbers.</li>
                            </ul>
                        </small>
                        <div class="invalid-feedback">
                            The token is invalid!
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Download</button>
                </form>
            </div>
        </div>

        <script>
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                    });
                }, false);
            })();
        </script>
    </body>
</html>