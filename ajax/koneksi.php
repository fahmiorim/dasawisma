<?php

$host       =  "localhost";
$dbuser     =  "postgres";
$dbpass     =  "zaxah2025";
$port       =  "5432";
$dbname    =  "db_dasawisma";


//binjai
//$host = "localhost";
//$port = "5432";
//$dbname = "dasawisma";
//$user = "postgres";
//$password = "binjai";

//vm telkom
//$host = "localhost";
//$port = "5432";
//$dbname = "dasawisma";
//$user = "postgres";
//$password = "bsc2017";



//server bcc
//$host = "localhost";
//$port = "5432";
//$dbname = "eperizinan";
//$user = "postgres";
//$password = "binjai";


$pg_options = "--client_encoding=UTF8";

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$dbuser} password={$dbpass} options='{$pg_options}'";
$koneksi = pg_connect($connection_string);
