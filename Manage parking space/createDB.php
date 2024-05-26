<?php

$link = mysqli_connect("localhost", "root", "");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}


$sql = "CREATE DATABASE parkingdatabase";

if (mysqli_query($link, $sql)) {
    echo "Database created successfully\n";
} else {
    echo 'Error creating database: ' . mysqli_error($link) . "\n";
}


mysqli_close($link);
?>
