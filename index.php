<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'">-->


        <link rel="stylesheet" href="./public/css/bootstrap.min.css">
        <link rel="stylesheet" href="./public/css/main.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
        <script src="../public/js/main.js" integrity="sha384-HvaLN1YH7wB0wInkz7frD1BNHlBjf+FhL1JsGq5+X+zT2iaTxPncpZ9NUF1PimfC" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="h-100 row align-items-center">
            <div class="col d-flex justify-content-center">
                <form enctype="multipart/form-data" action="src/upload.php" method="POST" class="needs-validation" novalidate>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file[]" multiple required>
                        <label class="custom-file-label" for="customFile">Choose file(s)</label>
                        <div class="invalid-feedback">
                            Please select a valid file.
                        </div>
                    </div><br/><br/>
                    <div class="form-group">
                    <select class="custom-select" name="duration" required>
                        <option value="">Duration</option>
                        <option value="24">24h</option>
                    </select>
                    <div class="invalid-feedback">Please select a duration.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <a class="btn btn-secondary" href="src/download.php" role="button">Download file</a>
                </form>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                bsCustomFileInput.init()
            });
        </script>
    </body>
</html>