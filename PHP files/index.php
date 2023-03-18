<?php
include("./head.php");
require_once("./db.php");
if (isset($_SESSION["auth"])) {
    $ob = new OperacijeBaze();
    $uloga = $ob->ulogaUseraPoId($_SESSION["auth"]);

    switch ($uloga) {
        case 0:
            header("Location: zaposleni.php");
            break;
        case 1:
            header("Location: menadzer.php");
            break;
        case 2:
            header("Location: administrator.php");
            break;
        default:
            header("Location: index.php");
            break;
    }
}
?>

<body>
    
    <?php
    include("./navbar-landing.php");

    include("./landing-content.php");

    include("./footer.php");
    ?>

</body>

</html>
