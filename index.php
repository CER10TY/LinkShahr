<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'">-->


        <link rel="stylesheet" href="./public/css/bootstrap.min.css">
        <link rel="stylesheet" href="./public/css/main.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="../public/js/main.js"></script>
    </head>

    <body>
        <div class="h-100 row align-items-center">
            <div class="col d-flex justify-content-center">
                <form enctype="multipart/form-data" class="col-sm-3" action="src/upload.php" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="file[]" multiple required>
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
                            <option value="8">8h</option>
                            <option value="16">16h</option>
                            <option value="24">24h (+2€)</option>
                            <option value="48">48h (+5€)</option>
                        </select>
                        <div class="invalid-feedback">Please select a duration.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <a class="btn btn-secondary" href="src/download.php" role="button">Download file</a>
                </form>
            </div>
        </div>
    </body>
</html>