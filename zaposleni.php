<?php
include("./head.php");
require_once("./db.php");
$ob = new OperacijeBaze();
if ($ob->ulogaUseraPoId($_SESSION["auth"]) != 0) header("Location: index.php");
?>
<body>
    
    <?php
    include("./navbar-user.php");
    include("./zaposleni-content.php");
    include("./zaposleni-modal.php");
    include("./footer.php");
    ?>

</body>

</html>