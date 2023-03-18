<?php
require_once("./kartice.php");
require_once("./db.php");
?>
<section class="container">
    <div class="kartice-grid">
        <?php
        $ob = new OperacijeBaze();

        $useri = $ob->sviUseri();
        if ($useri->num_rows > 0) {
            while ($user = $useri->fetch_assoc()) {
                
                // $str = napraviStavku($user["ime"], $user["id_usera"], "Mail", $user["email"], "Uloga", $user["role"]);
                $mail = $user["email"];
                $ime = $user["ime"];
                $role = ulogaURec($user["role"]);
                $komentar = $user["komentar"];

                $str = "<li class='pt-3'>Mail: <span class='fst-italic fw-semibold'>$mail</span></li><li>Uloga: <span class='fst-italic fw-semibold'>$role</span></li><li>Komentar: <span class='fst-italic fw-semibold'>$komentar</span></li>";

                echo napraviKarticu($user["ime"], -1, $user["id_usera"], $str);
            }
        }
        ?>
    </div>
    <div class="dodavanje"><div class="plus" onclick="dodavanje();">+</div></div>

</section>