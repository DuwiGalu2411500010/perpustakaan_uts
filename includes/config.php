<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'db_perpustakaan';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($mysqli->connect_error) {
    die("Koneksi gagal: ". $mysqli->connect_error);
}
?>