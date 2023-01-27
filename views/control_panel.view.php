<?php require('views/landing.view.php'); ?>

<section>
  <div class="container-fluid py-5">
    <div class="row">
      <div class="col-12 col-md-3 px-4">
        <div class="mb-2">
          <div class="card">
            <div class="card-body">
              <div class="card mb-1 p-2">
                <a href="create.php" class="btn btn-success">Crear nuevo post</a>
              </div>
              <div class="card mb-1 p-2">
                <a href="close.php" class="btn btn-danger"> <i class="bi bi-arrow-right-square"></i>Cerrar sesión</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-9 px-4 pe-md-5">
      <?php if($posts) :?>
        <?php foreach($posts as $post) :?>
          <div class="card mb-2 p-3">
            <a href="show.php?id=<?php echo $post['id'];?>"><img class="w-50 mb-3 rounded" src="<?php echo $post['img_url'];?>" alt=""></a>
            <div class="card-body">
              <h5 class="card-title" style="text-transform:uppercase;"><?php echo $post['title'];?></h5>
              <p class="text-muted"><small><?php echo translate_date($post['date']);?></small></p>            
              <p class="card-text"><?php echo reduce_phrase($post['post_body'], 200, "...");?></p>
              <div class="button-group">
                <a href="show.php?id=<?php echo $post['id'];?>" class="btn btn-success text-light">
                    Ver
                </a>
                <a href="edit.php?id=<?php echo $post['id'];?>" class="btn btn-warning text-light">
                    Editar
                </a>
                <a href="delete.php?id=<?php echo $post['id'];?>"class="btn btn-danger">
                    Eliminar
                </a>
              </div>
            </div>
          </div>
        <?php endforeach ;?>
        <?php require('pagination.php') ;?>
      <?php elseif($page == 1):?>
        <div class="jumbotron jumbotron-fluid">
             <div class="container">
               <h1 class="display-4">No hay ningun post</h1>
             </div>
          </div>
      <?php endif ;?>
      </div>
  </div>
</section>

<?php require('views/footer.view.php'); ?>