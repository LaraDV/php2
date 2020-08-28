<?php

try{
    $dbh = new PDO('mysql:dbname=trialdb;host=localhost:3306', 'root', 'NEW_DL15');
}

catch(PDOException $e)

{
    echo "Error: Could not connect. " . $e->getMessage();
}

$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);