<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/css/main.css">
    </head>
    <body>
        <?php

            function reArrayFiles(&$file_post) {

                $file_ary = array();
                $file_count = count($file_post['name']);
                $file_keys = array_keys($file_post);

                for ($i=0; $i<$file_count; $i++) {
                    foreach ($file_keys as $key) {
                        $file_ary[$i][$key] = $file_post[$key][$i];
                    }
                }

                return $file_ary;
            }

            $processed = false;
            $error = false;
            $errorMsg = "";
            $tokens = [];
            $names = [];
            
            if (!isset($_FILES) || $_FILES['file']['error'][0] !== 0) {
                $error = true;
                $errorMsg = "Error 413: Files are too large!";
            } 
            if ($_FILES['file']) {
                if ($_POST['duration']) {

                    $file_ary = reArrayFiles($_FILES['file']);
                    
                    foreach ($file_ary as $file) {
                        // Generate our token
                        $bytes = random_bytes(3);
                        $token = bin2hex($bytes);

                        $tokens[] = $token;

                        // Define upload directory, split string
                        $uploaddir = '/var/www/linkshare/uploads/';
                        $filesplit = explode(".", basename($file['name']));

                        if ($filesplit[0] && $filesplit[1]) {
                            $newName = $filesplit[0] . '.' . $token . '.' . $filesplit[1];
                            $uploadfile = $uploaddir . $newName;

                            if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                                // We successfully moved the file, now comes the SQLite part
                                $db = new SQLite3('files.db', SQLITE3_OPEN_READWRITE);

                                $statement = $db->prepare('INSERT INTO "files" ("filename", "token", "duration", "type") VALUES (:filename, :token, :duration, :type)');
                                $statement->bindValue(':filename', $newName);
                                $statement->bindValue(':token', $token);
                                $statement->bindValue(':duration', $_POST['duration']);
                                $statement->bindValue(':type', $file['type']);
                                $statement->execute();

                                $names[] = basename($file['name']);
                            }
                        }
                    }

                    $processed = true;
                }
            }
            if ($_POST['link']) {
                var_dump($_POST['link']);
            }
        ?>

        <?php if ($processed): ?>
            <div class="container h-100 d-flex justify-content-center black-full">
                <div class="jumbotron my-auto">
                <?php if (count($tokens) == 1): ?>
                    <h1 class="display-4">Your file was uploaded!</h1>
                    <p>The token that was generated for this file is: <strong><?php echo $token ?></strong>. The token expires in <strong><?php echo $_POST['duration'] ?> hours</strong>.</p>
                <?php else: ?>
                    <h1 class="display-4">Your files were uploaded!</h1>
                    <p>The following tokens were generated: <br />
                    <ul class="list-group">
                        <?php foreach($tokens as $index=>$singletoken): ?>
                            <li class="list-group-item"><strong><?php echo $singletoken ?></strong>: <?php echo $names[$index] ?></li>
                        <?php endforeach; ?>
                    </ul><br/>
                    These tokens expire in <strong><?php echo $_POST['duration'] ?> hours</strong>.</p>
                <?php endif; ?>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-dark btn-lg" href="../index.php" role="button">Go back</a>
                </p>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="container h-100 d-flex justify-content-center black-full">
                <div class="jumbotron my-auto">
                <h1 class="display-4">Error!</h1>
                <p>There was an error processing your request:<br/>
                    <span><em><?php echo $errorMsg ?></em></span></p>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-dark btn-lg" href="../index.php" role="button">Go back</a>
                </p>
                </div>
            </div>
        <?php endif; ?>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>