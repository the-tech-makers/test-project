<?php

if( !session_id() ) {
    session_start();
}
$db_name = 'db_new';
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';

$mysqli = new mysqli( $db_host, $db_username, $db_password, $db_name);

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}