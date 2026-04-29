<?php

// konfigurasi koneksi
$host       =  "localhost";
$dbuser     =  "postgres";
$dbpass     =  "zaxah2025";
$port       =  "5432";
$dbname    =  "db_dasawisma";


$pg_options = "--client_encoding=UTF8";

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$dbuser} password={$dbpass} options='{$pg_options}'";
$koneksi = pg_connect($connection_string);
