<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap</title>
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  </head>
  <body>
      <nav class="navbar navbar-expand-md p-3 bg-primary sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="index.php"><i class="bi bi-x-diamond-fill"></i> Inicio</a>
          <button class="navbar-toggler mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-md-flex justify-content-end" id="navbarSupportedContent">
            <form name="search" class="d-flex me-md-3" role="search" action="search.php" method="get">
              <input name="search" class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
              <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0 d-flex flex-row">
              <li class="nav-item p-2 p-md-0">
                <a class="nav-link text-white" href="#" title="Facebook"><i class="bi bi-facebook"></i></a>
              </li>
              <li class="nav-item p-2 p-md-0">
                <a class="nav-link text-white" href="#" title="Twitter"><i class="bi bi-twitter"></i></a>
              </li>
              <li class="nav-item p-2 p-md-0">
                <a class="nav-link text-white" href="#" title="Youtobe"><i class="bi bi-youtube"></i></a>
              </li>
              <li class="nav-item p-2 p-md-0">
                <a class="nav-link text-white" href="#" title="Instagram"><i class="bi bi-instagram"></i></a>
              </li>        
            </ul>
            <!-- admin -->
            <?php if($session) :?>
              <div class="btn-group ms-md-3">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                  Administrador
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                  <li><a class="dropdown-item" href="control_panel.php">Panel de Control</a></li>
                  <li><a class="dropdown-item" href="close.php">Cerrar Sesión</a></li>
                </ul>
              </div>
            <?php endif ;?>
            <!-- /admin -->
          </div>
        </div>
      </nav>
      <!-- content -->

  