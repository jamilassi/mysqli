<?php


if(isset($_GET['id'])){
$id =$_GET['id'];
} else {
exit();
}

$mysqli = new mysqli('localhost', 'root', 'root', 'MySql_local');
$table ="contacts";






if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}


$query = "SELECT * FROM contacts WHERE id=%d";
if ($result = $mysqli->query(sprintf($query,$id))) {
    printf("Select returned %d rows.\n", $result->num_rows);
    
    while ($row =$result->fetch_assoc()) {
        printf ('<address><strong><a href="opencontact.php">%s, %s</a></strong> %s</address>', $row["firstname"], $row["lastname"], $row["email"]);
    }

    /* Libération des résultats */
    $result->close();
}
  echo 'Success... ' . $mysqli->host_info . "\n<br>";  

$mysqli->close();


?>
     