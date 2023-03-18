<?php
function napraviKarticu($naslov, $rok, $id, ...$stavke) {

    $strStavke = '';

    for ($i=0; $i < count($stavke); $i++) { 
        $strStavke = $strStavke . $stavke[$i];
    }

    if ($id != -1) {
        $naslov = $naslov . '<button class="kartica-edit" onclick="izmeniProjekat(' . $id . ');"></button>';
    }
    
    $d = date("j. n. Y.", strtotime($rok));

    if ($rok == -1) {
        $d = "Prijavljen";
    }

    $str = sprintf(
        '<div class="kartica">
            <div class="kartica-title text-center">%s</div>
            <div class="kartica-rok">%s</div>
            <hr/>
            <div class="kartica-content">
                %s
            </div>
        </div>
        ', $naslov, $d, $strStavke);
    return $str;    
}

function statusURec($status) {
    switch ($status) {
        case 0:
            return "Na čekanju";
            break;
        case 1:
            return "U izradi";
            break;
        case 2:
            return "Završen";
            break;
        default:
            return "Nepoznat status";
            break;
    }
}

function ulogaURec($status) {
    switch ($status) {
        case 0:
            return "Zaposleni";
            break;
        case 1:
            return "Menadžer";
            break;
        case 2:
            return "Administrator";
            break;
        default:
            return "Nepoznata uloga";
            break;
    }
}

function napraviStavku($naslov, $id, ...$stavke) {
    // napraviStavku("Ime stavke", "Dodeljeno", "Milan Marinkovic", "Status", "Na cekanju", "Detalji", "...");
    // dakle, $stavke moraju imati paran br parametara
    if (count($stavke) % 2 != 0) die("Broj parametara nakon naslova i id-a mora biti paran!");

    $str = sprintf(
        '<li class="pt-3">
            %s
            <form>
                <ul class="stavka d-flex flex-column">
        ', $naslov);

    for ($i=0; $i < count($stavke); $i+=2) {
        $str = $str . sprintf('<li>%s: <span class="fst-italic fw-semibold">%s</span></li>', $stavke[$i], $stavke[$i+1]);
    }

    $str = $str . '<button type="button" class="ms-auto dugme boja-2" onclick="izmeniStavku('.$id.')">Izmena</button></ul></form></li>';

    return $str;
}

?>