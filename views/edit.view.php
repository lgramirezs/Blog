<?php require('views/landing.view.php'); ?>

<section class="py-md-5">
    <div class="container-fluid ">
        <div class="card p-4 mx-md-5">
            <?php require('errors.php'); ?>
            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="POST">
                <h1 class="h3">Editar Post</h1>
                <hr>
                <input type="hidden" value="<?php echo $post['id'];?>" name="id">
                <div class="mb-3">
                  <label for="title" class="form-label">Título</label>
                  <input type="text" class="form-control" id="title" name="title" value="<?php echo $post['title'];?>" style="text-transform:uppercase;">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Contenido</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="15" name="post_content"><?php echo $post['post_body'];?></textarea>
                </div>
                <div class="input-group mb-3">
                  <input type="file" class="form-control" id="inputGroupFile02" name="file">
                  <label class="input-group-text" for="inputGroupFile02">Imagen destacada</label>
                </div>
                  <input type="hidden" value="<?php echo $post['img_url'];?>" name="file_tmp">
                <div class="py-4">
                    <a href="control_panel.php" class="btn btn-dark">Descartar</a>
                    <button type="submit" class="btn btn-success">Subir post</button>
                </div>
            </form>
        </div> 
    </div>
</section>

<?php require('views/footer.view.php'); ;?>
