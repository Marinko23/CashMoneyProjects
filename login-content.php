<section class="container d-flex flex-column justify-content-center">
    <div class="row py-2">
        <div class="col-lg-5 fs-max">
            Prijavi se
        </div>
    </div>
    <div class="row py-2 justify-content-around">
        <div class="col-lg-5 d-none d-lg-block fs-p">
            <?php
            include("./login-svg.php");
            ?>
        </div>
        <div class="col-lg-5">
            <form action="auth.php" class="d-flex flex-column form-login justify-content-evenly" method="POST" >
                <input type="text" name="email" placeholder="Unesi e-mail" class="input-login-register">
                <input type="password" name="password" placeholder="Unesi lozinku" class="input-login-register">
                <div class="text-login-register">
                    Nemate nalog? Kliknite <a href="registracija.php">ovde za registraciju!</a>
                </div>
                <button class="dugme boja-2 font-1 m-0">Prijava</button>
            </form>
        </div>
    </div>

</section>