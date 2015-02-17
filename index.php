<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'MySql_local');
$table ="contacts";

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}


echo 'Success... ' . $mysqli->host_info . "\n<br>";
$query="SELECT * FROM contacts";
$link=mysqli_connect('localhost', 'root', 'root', 'MySql_local');
if ($result = $mysqli->query($query)) {
    printf("Select returned %d rows.\n", $result->num_rows);
    
    
    if ($result = mysqli_query($link, $query)) {

    /* Récupère un tableau associatif */
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s (%s)\n", $row["firstame"], $row["email"]);
    }

    /* Libération des résultats */
    mysqli_free_result($result);
}
    /* free result set */
   $result->close();
}


/*

$query = "SELECT * FROM contacts";

if ($result = $mysqli->query($query)) {

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
}
*/

$mysqli->close();


?>