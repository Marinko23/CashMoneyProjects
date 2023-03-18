<?php
require_once("./kartice.php");
require_once("./db.php");
?>
<section class="container">
    <div class="kartice-grid">
        <?php
        $ob = new OperacijeBaze();

        $projekti = $ob->projektiKorisnika($_SESSION["auth"]);
        if ($projekti->num_rows > 0) {
            while ($projekat = $projekti->fetch_assoc()) {
                $stavke = $ob->stavkeProjektaKorisnika($projekat["id_projekta"], $_SESSION["auth"]);

                $stavkeStr = "";
                if ($stavke->num_rows > 0) {
                    while ($stavka = $stavke->fetch_assoc()) {
                        $stavkeStr = $stavkeStr . napraviStavku($stavka["naziv"], $stavka["id_stavke"], "Status", statusURec($stavka["status"]), "Detalji", $stavka["detalji"]);
                    }
                }

                echo napraviKarticu($projekat["naziv"], $projekat["rok"], -1, $stavkeStr);
            }
        }
        ?>
    </div>
</section>