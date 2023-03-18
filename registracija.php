<?php
include("./head.php");
if (isset($_SESSION["auth"])) header("Location: index.php");
?>
<body>

    <?php
    include("./register-content.php");
    if (isset($_GET["postoji"])) include("./modalpostojiuser.php");
    if (isset($_GET["poklapanje"])) include("./modalpoklapanje.php");
    if (isset($_GET["mail"])) include("./modalmail.php");
    if (isset($_GET["sifra"])) include("./modalsifra.php");
    include("./footer.php");
    ?>

</body>

</html>