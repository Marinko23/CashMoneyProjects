<?php
session_start();
require_once("./db.php");
$ob = new OperacijeBaze();
if ($ob->ulogaUseraPoId($_SESSION["auth"]) != 2) die(header("Location: index.php"));
$ob->addUser($_POST["ime"], $_POST["mail"], $_POST["password"], $_POST["uloga"]);
header("Location: administrator.php");
?>
