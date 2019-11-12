<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'">-->


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./public/css/main.css">
        <link rel="stylesheet" href="./public/css/index.css">
    </head>

    <body>

        <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                <a href="#"><h3 class="masthead-brand">Quicksha.re</h3></a>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="src/features.php">Features</a>
                    <a class="nav-link" href="src/contact.php">Contact</a>
                </nav>
                </div>
            </header>

            <main role="main" class="inner cover d-flex justify-content-center">
                <form enctype="multipart/form-data" class="col-sm-3" action="src/upload.php" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <div class="custom-file" style="background: hsl(0%, 0%, 14%) !important;">
                            <input type="file" class="custom-file-input" id="customFile" name="file[]" style="background-color: #333 !important" multiple required>
                            <label class="custom-file-label" for="customFile" id="custom-file-lbl">Choose file(s)</label>
                            <div class="invalid-feedback">
                                Please select a valid file.
                            </div>
                        </div>
                        <ul class="list-group d-none" id="custom-file-list">
                        </ul>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="duration" required>
                            <option value="">Duration</option>
                            <option value="6">6 hours</option>
                            <option value="12">12 hours</option>
                        </select>
                        <div class="invalid-feedback">Please select a duration.</div>
                    </div>
                    <button type="submit" class="btn btn-light">Upload</button>
                    <a class="btn btn-dark" href="src/download.php" role="button">Download file</a>
                    <small id="fileHelpBlock" class="form-text">
                        Individual files cannot be larger than 150 MB.
                    </small>
                </form>
            </main>

            <footer class="mastfoot mt-auto text-center">
                <div class="inner">
                <p>Partial use of Bootstrap cover template by <a href="https://twitter.com/mdo">@mdo</a>.<br/>
                &copy; 2019- <a href="https://www.soeren.codes/">soeren.codes</a></p>
                </div>
            </footer>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../public/js/main.js"></script>
    </body>
</html>