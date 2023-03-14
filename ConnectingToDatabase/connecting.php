<?php

$connection = new mysqli("localhost", "root", "", "ecommerce");

if($connection->errno == 0)
{
    $sqlReq = "SELECT c.firstName, c.lastName, t.item, t.value from clients c INNER JOIN transactions t on c.clientId = t.clientId;";
    $result = $connection->query($sqlReq);
    if($result === false)
    {
        echo "Incorrect SQL request";
        exit();
    }
    $row = $result->fetch_assoc();

    while ($row !== null)
    {
        echo $row["firstName"]. " ";
        echo $row["lastName"]. " ";
        echo $row["item"]. " ";
        echo $row["value"] . "<br>";

        $row = $result->fetch_assoc();
    }
    
}
