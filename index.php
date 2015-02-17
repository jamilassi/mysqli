<?php



$mysqli = new mysqli('localhost', 'root', 'root', 'MySql_local');
$table ="contacts";
$id=mysqli_connect('localhost', 'root', 'root', 'MySql_local');





if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}


$query = "SELECT * FROM contacts";

/*if ($result = $mysqli->query($query)) {

    printf ('<ul>Table contacts contains:</ul>');
    while ($row = $result->fetch_row()) {
        printf ("<br><li>");
        printf ("%s",$row[1]);
        echo '&nbsp;&nbsp;&nbsp;';
        printf ("%s",$row[2]);
        echo '&nbsp;&nbsp;&nbsp;';
        printf ("%s",$row[3]);
        
    }

    $result->close();
}*/




if ($result = $mysqli->query(sprintf($query,$id))) {
    printf("Select returned %d rows.\n", $result->num_rows);
    
    while ($row =$result->fetch_assoc()) {
        printf ('<address><strong><a href="opencontact.php?id='.$row[id].'">%s, %s</a></strong> %s</address>', $row["firstname"], $row["lastname"], $row["email"]);
    }

    /* Libération des résultats */
    $result->close();
}
  echo 'Success... ' . $mysqli->host_info . "\n<br>";  

$mysqli->close();


/*


*/



?>