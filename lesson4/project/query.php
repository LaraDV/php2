<?php
include 'conn.php';

if(isset($_POST['more'])){
    $mult = $_POST['more'];
try{
    $sql = "SELECT good_name, good_price FROM goods LIMIT 0, " . 25*$mult;
    $sth = $dbh -> prepare($sql);
    $sth -> execute();

    while ($result = $sth -> fetch()) {
        $data[] = $result[0];
    }
}catch (PDOException $e){

}
    foreach ($data as $line) {
        echo '<li>' . $line . '</li>';
    }

} else {
    try{
        $sql = "SELECT good_name, good_price FROM goods LIMIT 0, 25";
    $sth = $dbh -> prepare($sql);
    $sth -> execute();

    while ($result = $sth -> fetch()) {
        $data[] = $result[0];
    }
    }catch (PDOException $e){

    }foreach ($data as $line) {
        echo '<li>' . $line . '</li>';
    }
}

unset($dbh);
