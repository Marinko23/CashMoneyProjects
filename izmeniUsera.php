<?php
session_start();
require_once("./db.php");
$ob = new OperacijeBaze();
if ($ob->ulogaUseraPoId($_SESSION["auth"]) != 2) die(header("Location: index.php"));
$ob->izmeniUsera($_POST["ime"], $_POST["mail"], $_POST["uloga"], $_POST["komentar"], $_POST["id"]);
header("Location: administrator.php");
?>