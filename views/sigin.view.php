<?php require('views/landing.view.php'); ?>

<section>
  <div class="container-fluid p-5 d-flex justify-content-center">
    <div class="card p-4">
      <?php require('errors.php'); ?>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <h1 class="h3">Registro de usuario administrador</h1>
        <hr>
        <div class="form-floating mb-3">
          <input name="user" type="text" class="form-control" id="user" placeholder="Nombre de usuario" value="<?php echo (!$successfully && isset($user)) ? $user : ''; ?>" tabindex="1">
          <label for="user">Nombre de usuario</label>
        </div>
        <div class="form-floating mb-3">
          <input name="password" type="password" class="form-control" id="password" placeholder="Contraseña" value="<?php echo (!$successfully && isset($password)) ? $password : ''; ?>" tabindex="2">
          <label for="password">Contraseña</label>
        </div>
        <div class="form-floating mb-3">
          <input name="email" type="email" class="form-control" id="email" placeholder="Correo electrónico" value="<?php echo (!$successfully && isset($email)) ? $email : '' ;?>" tabindex="3">
          <label for="email">Correo electrónico</label>
        </div>
        <div class="py-4">
          <button type="submit" class="btn btn-success" tabindex="4">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</section>

<?php require('views/footer.view.php');; ?>