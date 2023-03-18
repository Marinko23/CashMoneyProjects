<?php
session_start();

function redirect() {
    header("Location: index.php");
}
function redirectNetacno() {
    header("Location: prijava.php?netacno");
}

// ako je user vec ulogovan vracamo se na pocetnu stranu
if (isset($_SESSION["auth"])) die(redirect());

// ako nisu poslati email i password u POST requestu vracamo se na pocetnu stranu
if (!(isset($_POST["email"]) && isset($_POST["password"]))) die(redirect());

$email = $_POST["email"];
$password = $_POST["password"];

require_once("db.php");

$ob = new OperacijeBaze();

// ako nisu tacni email i password vracamo se na login
if (!$ob->proveriUsera($email, $password)) die(redirectNetacno());

// ako je sve tacno, postavljamo session na id usera
$_SESSION["auth"] = $ob->idUseraPoMail($email);

// vracamo se na pocetnu stranu
redirect();

?>
