<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

class OperacijeBaze {
    private $host, $username, $password, $dbName;

    function __construct()
    {
        $this->host = "localhost";
        $this->username = "cmp";
        $this->password = "]pJyppzMUYV1scXf";
        $this->dbName = "cashmoneyprojects";
    }

    function connect() {
        return new mysqli($this->host, $this->username, $this->password, $this->dbName);
    }

    function addUser($ime, $email, $password, $role = 0, $komentar = "") {
        $pwEncrypted = password_hash($password, PASSWORD_BCRYPT);

        $sql = sprintf("INSERT INTO `user`(`ime`, `email`, `password`, `role`, `komentar`) VALUES ('%s', '%s','%s', %d, '%s')", $ime, $email, $pwEncrypted, $role, $komentar);

        $this->connect()->query($sql);
    }

    function projektiKorisnika($id) {
        $sql = sprintf("
        SELECT DISTINCT projekti.* 
        FROM projekti, stavke 
        WHERE stavke.id_projekta=projekti.id_projekta
        AND stavke.id_usera=%d", $id);

        return $this->connect()->query($sql);
    }

    function sviProjekti() {
        $sql = "SELECT * FROM projekti";

        return $this->connect()->query($sql);
    }

    function sviUseri() {
        $sql = "SELECT id_usera, ime, email, role, komentar FROM user";

        return $this->connect()->query($sql);
    }

    function infoUsera($id) {
        $sql = "SELECT id_usera, ime, email, role, komentar FROM user WHERE id_usera=$id";

        return $this->connect()->query($sql);
    }

    function sviKorisniciMenadzer() {
        $sql = "SELECT id_usera, ime FROM user";

        return $this->connect()->query($sql);
    }
    
    function stavkeProjektaKorisnika($id_projekta, $id_usera) {
        $sql = sprintf("
        SELECT *
        FROM stavke 
        WHERE id_projekta=%d
        AND id_usera=%d", $id_projekta, $id_usera);

        return $this->connect()->query($sql);
    }

    function stavkeProjekta($id_projekta) {
        $sql = sprintf("
        SELECT *
        FROM stavke 
        WHERE id_projekta=%d", $id_projekta);

        return $this->connect()->query($sql);
    }

    function proveriUsera($email, $password) {
        $sql = sprintf("SELECT password
        FROM user 
        WHERE email='%s'", $email);

        $res = $this->connect()->query($sql);

        // ako nema usera sa datim emailom false
        if ($res->num_rows == 0) return false;
        // ako je sifra netacna false
        if (!password_verify($password, $res->fetch_assoc()["password"])) return false;

        // ako prodjemo provere true
        return true;
    }

    function idUseraPoMail($email) {
        $sql = sprintf("SELECT id_usera
        FROM user 
        WHERE email='%s'", $email);

        return $this->connect()->query($sql)->fetch_assoc()["id_usera"];
    }

    function ulogaUseraPoId($id) {
        $sql = sprintf("SELECT role
        FROM user
        WHERE id_usera=%d", $id);

        return $this->connect()->query($sql)->fetch_assoc()["role"];
    }

    function imeUseraPoId($id) {
        $sql = sprintf("SELECT ime
        FROM user 
        WHERE id_usera=%d", $id);

        return $this->connect()->query($sql)->fetch_assoc()["ime"];
    }

    function postojiUserSaMailom($mail) {
        $sql = sprintf("SELECT *
        FROM user 
        WHERE email='%s'", $mail);

        return $this->connect()->query($sql)->num_rows > 0;
    }

    function stavkaPoId($id) {
        $sql = sprintf("SELECT *
        FROM stavke 
        WHERE id_stavke=%d", $id);

        return $this->connect()->query($sql)->fetch_assoc();
    }

    function projekatPoId($id) {
        $sql = sprintf("SELECT *
        FROM projekti 
        WHERE id_projekta=%d", $id);

        return $this->connect()->query($sql)->fetch_assoc();
    }

    function izmeniStavkuZaposleni($status, $komentar, $id) {
        $sql = sprintf("UPDATE stavke SET status=$status, komentari='$komentar' WHERE id_stavke=$id");

        $this->connect()->query($sql);
    }

    function izmeniStavkuMenadzer($id_usera, $naziv, $status, $detalji, $komentar, $id) {
        $sql = sprintf("UPDATE stavke SET id_usera=$id_usera, naziv='$naziv', status=$status, detalji='$detalji', komentari='$komentar' WHERE id_stavke=$id");

        $this->connect()->query($sql);
    }

    function izmeniProjekatMenadzer($naziv, $lokacija, $rok, $id) {
        $sql = sprintf("UPDATE projekti SET naziv='$naziv', lokacija='$lokacija', rok='$rok' WHERE id_projekta=$id");

        $this->connect()->query($sql);
    }

    function izmeniUsera($ime, $mail, $role, $komentar, $id) {
        $sql = sprintf("UPDATE user SET ime='$ime', email='$mail', role=$role, komentar='$komentar' WHERE id_usera=$id");

        $this->connect()->query($sql);
    }

    function dodajProjekatMenadzer($naziv, $lokacija, $rok) {
        $sql = "INSERT INTO projekti (naziv, lokacija, rok, aktivan) VALUES ('$naziv', '$lokacija', '$rok', 1)";

        $this->connect()->query($sql);
    }

    function dodajStavkuMenadzer($id_usera, $id_projekta, $naziv, $status, $detalji, $komentari) {
        $sql = "INSERT INTO stavke (id_usera, id_projekta, naziv, status, detalji, komentari) 
        VALUES ($id_usera, $id_projekta, '$naziv', $status, '$detalji', '$komentari')";

        $this->connect()->query($sql);
    }

    function ukloniProjekat($id) {
        $sql = "DELETE FROM projekti WHERE id_projekta=$id";

        $this->connect()->query($sql);
    }

    function ukloniStavku($id) {
        $sql = "DELETE FROM stavke WHERE id_stavke=$id";

        $this->connect()->query($sql);
    }

    function ukloniUsera($id) {
        $sql = "DELETE FROM user WHERE id_usera=$id";

        $this->connect()->query($sql);
    }
}

// dodavanje pocetnih usera
// $ob = new OperacijeBaze();
// $ob->addUser("Milan Marinković", "milan.marinkovic@cashmoneyprojects.com", "sifra123");
// $ob->addUser("Filip Jovanović", "filip.jovanovic@cashmoneyprojects.com", "sifra321");
?>