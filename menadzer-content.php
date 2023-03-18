<?php
require_once("./kartice.php");
require_once("./db.php");
?>
<section class="container">
    <div class="kartice-grid">
        <?php
        $ob = new OperacijeBaze();

        $projekti = $ob->sviProjekti();
        if ($projekti->num_rows > 0) {
            while ($projekat = $projekti->fetch_assoc()) {
                $stavke = $ob->stavkeProjekta($projekat["id_projekta"]);

                $stavkeStr = "";
                if ($stavke->num_rows > 0) {
                    while ($stavka = $stavke->fetch_assoc()) {
                        $stavkeStr = $stavkeStr . napraviStavku($stavka["naziv"], $stavka["id_stavke"], "Dodeljeno", 
                        $ob->imeUseraPoId($stavka["id_usera"]), "Status", statusURec($stavka["status"]), "Detalji", $stavka["detalji"]);
                    }
                }

                $id = $projekat["id_projekta"];

                $stavkeStr = $stavkeStr . "<div class='dodavanje-stavke'><div class='plus' onclick='dodavanjeStavke($id);'>+</div></div>";

                echo napraviKarticu($projekat["naziv"], $projekat["rok"], $projekat["id_projekta"], $stavkeStr);
            }
        }
        ?>
    </div>
    <div class="dodavanje"><div class="plus" onclick="dodavanje();">+</div></div>

</section>