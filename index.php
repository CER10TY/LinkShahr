<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'">-->


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./public/css/main.css">
        <link rel="stylesheet" href="./public/css/index.css">
    </head>

    <body>

        <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                <a href="#"><h3 class="masthead-brand">[CP&amp;Share]</h3></a>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="src/features.php">Features</a>
                    <a class="nav-link" href="src/contact.php">Contact</a>
                </nav>
                </div>
            </header>

            <main role="main" class="inner cover d-flex justify-content-center">
                <form enctype="multipart/form-data" class="col-sm-2 needs-validation mt-2" action="src/upload.php" method="POST" novalidate>
                    <div class="form-group">
                        <input type="file" class="file-input" id="customFile" name="file[]" data-multiple-caption="{count} file(s) selected" multiple>
                        <label class="file-label" for="customFile" id="custom-file-lbl">Choose file(s)</label>
                        </ul>
                        <p class="text-center">or</p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="linkInput" name="link" placeholder="Paste any text">
                        <div class="invalid-feedback">
                            Please choose valid file(s) or type in any text.
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" id="durationSelect" name="duration" required>
                            <option value="">Duration</option>
                            <option value="6">6 hours</option>
                            <option value="12">12 hours</option>
                        </select>
                        <div class="invalid-feedback">Please select a duration.</div>
                    </div>
                    <button type="submit" class="btn btn-light">Upload</button>
                    <a class="btn btn-dark" href="src/download.php" role="button">Download file</a>
                    <small id="fileHelpBlock" class="form-text">
                        Individual files cannot be larger than 250 MB.
                    </small>
                    <br/>
                    <p class="text-center">
                        <i class="fa fa-2x fa-lock"></i> <br/>Encrypted using the AES-256 encryption standard
                    </p>
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
        <script src="./public/js/main.js"></script>
    </body>
</html>