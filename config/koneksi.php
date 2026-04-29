<?php

$host       =  "localhost";
$dbuser     =  "";
$dbpass     =  "";
$port       =  "5432";
$dbname     =  "";


$pg_options = "--client_encoding=UTF8";

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$dbuser} password={$dbpass} options='{$pg_options}'";
$koneksi = pg_connect($connection_string);
