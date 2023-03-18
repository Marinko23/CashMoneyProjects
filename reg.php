<?php
session_start();

function redirect() {
    header("Location: index.php");
}
function redirectPostoji() {
    header("Location: registracija.php?postoji");
}
function redirectPoklapanje() {
    header("Location: registracija.php?poklapanje");
}
function redirectSifra() {
    header("Location: registracija.php?sifra");
}
function redirectMail() {
    header("Location: registracija.php?mail");
}


// ako je user vec ulogovan vracamo se na pocetnu stranu
if (isset($_SESSION["auth"])) die(redirect());

// ako nisu poslati email, password i ponovljeni password u POST requestu vracamo se na pocetnu stranu
if (!(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["passwordrepeat"]) && isset($_POST["ime"]))) die(redirect());

$ime = $_POST["ime"];
$email = $_POST["email"];
$password = $_POST["password"];
$passwordRepeat = $_POST["passwordrepeat"];

// regex provera za mail https://ihateregex.io/expr/email
if (!preg_match("/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/", $email)) die(redirectMail());

// proveravamo da li se lozinka i ponovljena lozinka poklapaju
if ($password != $passwordRepeat) die(redirectPoklapanje());

// proveravamo da li lozinka je bar 8 karaktera, 1 broj i bar 1 slovo 
if (strlen($password) < 8 || !preg_match('/[0-9]/', $password) || !preg_match('/[a-zA-Z]/', $password)) die(redirectSifra());

require_once("./db.php");

$ob = new OperacijeBaze();

// proveravamo da li vec postoji user sa istim emailom
if ($ob->postojiUserSaMailom($email)) die(redirectPostoji());

// ako je sve u redu, pravimo usera
$ob->addUser($ime, $email, $password, 0);
echo "USPESNO! $email $password";

// prebacujemo na login stranicu
// header("Location: prijava.php?uspesnaRegistracija");

?>