<?php
// dont close php or else pure php with free lines can give errors
$serverName = "localhost";
$dbUserName = "admin";
$dbPassword = "root";
$dbName = "academicportal";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
    // kills the process
}
