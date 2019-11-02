<?php
    const TIME_MINIMUM = 6;

    $db = new SQLite3('/usr/share/nginx/html/src/files.db', SQLITE3_OPEN_READWRITE);
    $statement = $db->prepare('select id, filename, token, duration, cast((julianday() - julianday(timestamp)) * 24 as integer) as timediff, timestamp from "files" where timediff >= ?');
    $statement->bindValue(1, TIME_MINIMUM);
    $result = $statement->execute();

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        if ($row['timediff'] >= $row['duration']) {
            $delete = $db->prepare('delete from "files" where id = ?');
            $delete->bindValue(1, $row['id']);
            $deleteResult = $delete->execute();
            $deleteResult->finalize();
        }
    }

    $result->finalize();

?>