<?php
/* Database connection settings */
$host = 'localhost';
$user = 'weg4vcdb_NatFood';
$pass = 'fVl!5RsEj~?v';
$db = 'weg4vcdb_NationalFood';
// $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$mysqli = new MySQLi($host,$user,$pass,$db);
if ($mysqli->connect_error) {
   echo "Not connected, error: " . $mysqli->connect_error;
}
// else {
//    echo "Connected.";
// }
