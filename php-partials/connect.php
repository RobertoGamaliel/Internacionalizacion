<?php
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "Motoride");
define("DB_NAME", "inter");
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//$con = mysqli_connect("localhost", "root", "password", "mydb");

if ($con === false) {
    die("ERROR: No se pudo conectar a la base de datos. " . mysqli_connect_error());
}
