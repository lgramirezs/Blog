<?php require('views/landing.view.php'); ?>

<section class="py-md-5">
    <div class="container-fluid ">
        <div class="card p-4 mx-md-5">
            <?php require('errors.php'); ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="POST" enctype="multipart/form-data">
                <h1 class="h3">Nuevo Post</h1>
                <hr>
                <div class="mb-3">
                  <label for="title" class="form-label">Título</label>
                  <input type="text" class="form-control" id="title" placeholder="post" name="title" style="text-transform:uppercase;" tabindex="1" value="<?php echo (!$successfully && isset($title))? $title: '';?>">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Contenido</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="post_content" tabindex="2"><?php echo (!$successfully && isset($post_content))? $post_content: '';?></textarea>
                </div>
                <div class="input-group mb-3">
                  <input type="file" class="form-control" id="inputGroupFile02" name="file" tabindex="3">
                  <label class="input-group-text" for="inputGroupFile02">Imagen destacada</label>
                </div>
                <div class="py-4">
                    <a href="control_panel.php" class="btn btn-dark">Descartar</a>
                    <button type="submit" class="btn btn-success" tabindex="4">Subir post</button>
                </div>
            </form>
        </div> 
    </div>
</section>

<?php require('views/footer.view.php');?>
