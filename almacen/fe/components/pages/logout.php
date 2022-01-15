<?php
session_start();
session_destroy();
$b = ( in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ) ) ? "localhost/" : "";
header("Location://" . $b . "grenyaobrador.es/almacen/fe/index.php");
