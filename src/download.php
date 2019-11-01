<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' 'sha384-HvaLN1YH7wB0wInkz7frD1BNHlBjf+FhL1JsGq5+X+zT2iaTxPncpZ9NUF1PimfC'">


        <link rel="stylesheet" href="../public/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public/css/main.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="../public/js/main.js" integrity="sha384-HvaLN1YH7wB0wInkz7frD1BNHlBjf+FhL1JsGq5+X+zT2iaTxPncpZ9NUF1PimfC" crossorigin="anonymous"></script>
    </head>
    <body>

        <?php
            $invalid = false;
            if (isset($_POST['filetoken'])) {
                $db = new SQLite3('files.db', SQLITE3_OPEN_READWRITE);

                if (preg_match('/^[0-9A-Za-z]{6}$/', $_POST['filetoken'])) {
                    // Query DB for entry with given token
                    $result = $db->querySingle('SELECT * FROM "files" WHERE "token" = \'' . $_POST['filetoken'] . '\'', true);
                    if ($result && $result['token'] == $_POST['filetoken']) {
                        $uploaddir = '/var/www/linkshare/uploads/';
                        $file = $uploaddir . $result['filename'];

                        if (file_exists($file)) {
                            // Remove token from filename
                            $cleanfile = explode(".", basename($file));

                            // Clean out whitespaces
                            ob_end_clean();

                            // Prep headers for immediate download, read file
                            header('Content-Description: File Transfer');
                            header('Content-Type: ' . $result['type'] . '');
                            header('Content-Disposition: attachment; filename="'.$cleanfile[0].'.'.$cleanfile[2].'"');
                            header('Expires: 0');
                            header('Cache-Control: must-revalidate');
                            header('Pragma: public');
                            header('Content-Length: ' . filesize($file));
                            readfile($file);
                        }
                    } else {
                        // If result returns nothing, then the token is expired.
                        $invalid = true;
                    }
                }
            }
        ?>

        <div class="h-100 row align-items-center">
            <div class="col d-flex justify-content-center">
                <form action="" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="token">Please enter your token:</label>
                        <input type="text" class="form-control" id="token" name="filetoken" placeholder="Token" pattern="^[0-9A-Za-z]{6}$" maxlength="6" required>
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
                        <?php if ($invalid) { ?>
                        <div class="invalid-token">
                            The given token has expired.
                        </div>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Download</button>
                    <a class="btn btn-secondary" href="../index.php" role="button">Go back</a>
                </form>
            </div>
        </div>
    </body>
</html>