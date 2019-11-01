<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'">


        <link rel="stylesheet" href="../public/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public/css/main.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            // File attributes: name, type, tmp_name, size
            // POST Attributes: duration
            if ($_FILES['file'] && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
                if ($_POST['duration']) {
                    // Generate our token
                    $bytes = random_bytes(3);
                    $token = bin2hex($bytes);

                    // Define upload directory, split string
                    $uploaddir = '/var/www/linkshare/uploads/';
                    $filesplit = explode(".", basename($_FILES['file']['name']));

                    if ($filesplit[0] && $filesplit[1]) {
                        $newName = $filesplit[0] . '.' . $token . '.' . $filesplit[1];
                        $uploadfile = $uploaddir . $newName;

                        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                            // We successfully moved the file, now comes the SQLite part
                            $db = new SQLite3('files.db', SQLITE3_OPEN_READWRITE);

                            $statement = $db->prepare('INSERT INTO "files" ("filename", "token", "duration") VALUES (:filename, :token, :duration)');
                            $statement->bindValue(':filename', $newName);
                            $statement->bindValue(':token', $token);
                            $statement->bindValue(':duration', $_POST['duration']);
                            $statement->execute(); // you can reuse the statement with different values
                        }
                    }
                }
            } elseif ($_FILES['file']['error'] != UPLOAD_ERR_OK) {
                // Do something
            }
        ?>
    </body>
</html>