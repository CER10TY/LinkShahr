<?php

    const TIME_MINIMUM = 1;

    $db = new SQLite3('../files.db', SQLITE3_OPEN_READWRITE);
    $statement = $db->prepare('select filename, token, duration, cast((julianday() - julianday(timestamp)) * 24 * 60 as integer) as tt, timestamp from "files" where tt >= ?');
    $statement->bindValue(1, TIME_MINIMUM);
    $result = $statement->execute();

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        if ($row['duration'] <= TIME_MINIMUM) {
            
        }
    }

    $result->finalize();

?>