<?php
/* Database connection settings */
$host = 'localhost';
$user = 'weg4vcdb_Bennett';
$pass = '99876423';
$db = 'weg4vcdb_InitialSiteLaunch';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);