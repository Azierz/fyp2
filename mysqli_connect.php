<?php

// Set the database access information as constants:
DEFINE ('DB_USER', 'imsmolel_Azierz');
DEFINE ('DB_PASSWORD', 'ORA.ora=77');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'imsmolel_kh_event');

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');

?>