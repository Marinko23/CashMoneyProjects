<?php
include("./head.php");
if (isset($_SESSION["auth"])) header("Location: index.php");
?>

<body>
    <?php
    include("./login-content.php");
    if (isset($_GET["netacno"])) include("modalnetacno.php");
    if (isset($_GET["uspesnaRegistracija"])) include("modalUspesnaRegistracija.php");
    include("./footer.php");
    ?>

</body>

</html>
