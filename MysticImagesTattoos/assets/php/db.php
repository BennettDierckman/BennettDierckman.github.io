<?php
/* Database connection settings */
$host = 'localhost';
$user = 'mysticim_mysticim';
$pass = 'AwesomeAdam_1';
$db = 'mysticim_website';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);