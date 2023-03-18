<?php
include("./head.php");
if (!isset($_SESSION["auth"])) header("Location: index.php");
require_once("./db.php");
$ob = new OperacijeBaze();
if ($ob->ulogaUseraPoId($_SESSION["auth"]) != 2) header("Location: index.php");
?>
<body>
    
    <?php
    include("./navbar-user.php");
    include("./admin-content.php");
    include("./admin-modal.php");
    include("./footer.php");
    ?>

</body>

</html>