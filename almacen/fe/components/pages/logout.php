<?php
session_start();
session_destroy();
header("Location:/almacen/fe/index.php");
