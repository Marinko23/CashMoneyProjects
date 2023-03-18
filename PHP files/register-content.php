<section class="container d-flex flex-column justify-content-center">
    <div class="row py-2">
        <div class="col-lg-5 fs-max">
            Registruj se
        </div>
    </div>
    <div class="row py-2 justify-content-around">
        <div class="col-lg-5 d-none d-lg-block fs-p">
            <?php
            include("./register-svg.php");
            ?>
        </div>
        <div class="col-lg-5">
            <form action="reg.php" class="d-flex flex-column form-login justify-content-evenly" method="post">
                <input type="text" name="ime" placeholder="Unesi ime" class="input-login-register">
                <input type="text" name="email" placeholder="Unesi e-mail" class="input-login-register">
                <input type="password" name="password" placeholder="Unesi lozinku" class="input-login-register">
                <input type="password" name="passwordrepeat" placeholder="Ponovi lozinku" class="input-login-register">
                <div class="text-login-register">
                    Već imate nalog? Kliknite <a href="prijava.php">ovde za prijavu!</a>
                </div>
                <button class="dugme boja-2 font-1 m-0">Registracija</button>
            </form>
        </div>
    </div>
</section>
