<?php require('views/landing.view.php'); ?>

<section class="py-md-5">
    <div class="container-fluid p-5 d-flex justify-content-center">
        <div class="card p-4">
            <?php require('errors.php'); ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                <h1 class="h3">Inicio de sesión</h1>
                <hr>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="user" placeholder="Usuario" name="user" tabindex="1">
                  <label for="user">Nombre de usuario</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" tabindex="2">
                  <label for="floatingPassword">Contraseña</label>
                </div>
                <div class="py-4">
                    <button type="submit" class="btn btn-success" tabindex="3">Ingresar</button>
                </div>
                <p>
                    <a href="">¿Has olvidado tu contraseña?</a>
                </p>
            </form>
        </div> 
    </div>
</section>

<?php require('views/footer.view.php'); ;?>
