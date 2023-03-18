<?php
session_start();
require_once("./db.php");
$ob = new OperacijeBaze();
if ($ob->ulogaUseraPoId($_SESSION["auth"]) != 2) die(header("Location: index.php"));
$ob->ukloniUsera($_GET["id"]);
header("Location: administrator.php");
?>
