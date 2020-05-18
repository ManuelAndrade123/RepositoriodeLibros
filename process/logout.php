<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$hora=date("H:i:s");
consultasSQL::UpdateSQL("bitacora", "Salida='$hora'", "Codigo='".$_SESSION['codeBit']."'");
session_unset();
session_destroy();
header("Location: ../index.php"); 