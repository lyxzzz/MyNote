<?php
    class MyDB extends SQLite3
    {
        function __construct($name = "abc.db")
        {
            $this->open($name);
        }
    }
    $db = new MyDB();
    if(!$db){
        echo $db->lastErrorMsg();
    } else {
        echo "Opened database successfully\n";
    }
?>