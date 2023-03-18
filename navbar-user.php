<!-- bootstrap navbar https://getbootstrap.com/docs/5.2/components/navbar/ -->
<nav class="navbar navbar-expand bg-white">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="img/emojione-v1_money-with-wings.png" width="43px" height="43px">
            <div class="d-flex flex-column brand-text ps-2">
                <div>
                    Cash money
                </div>
                <div>projects</div>
            </div>
        </a>
        <div class="z-1 d-flex">
            <div class="user-icon my-auto">
                <?php
                require_once("./db.php");
                $ob = new OperacijeBaze();
                echo $ob->imeUseraPoId($_SESSION["auth"])[0];
                ?>
            </div>
            <a href="logout.php">
                <button class="dugme boja-2">Odjavi se</button>
            </a>
        </div>
    </div>
</nav>