<?php require('views/landing.view.php'); ?>

<section>
  <div class="container-fluid py-5">
    <div class="row">
      <div class="col-12 col-md-3 px-4">
        <div class="mb-2">
          <div class="card text-center">
            <img src="./img/back.jpg" class="card-img-top" >
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="mb-2">
          <div class="card">
            <div class="card-body">
              <div class="card mb-1 p-2">
                <h5 class="card-title">Special title treatment</h5>
                <a href="#" class="link">Go somewhere</a>
              </div>
              <div class="card mb-1 p-2">
                <h5 class="card-title">Special title treatment</h5>
                <a href="#" class="card-link">Go somewhere</a>
              </div>
              <div class="card mb-1 p-2">
                <h5 class="card-title">Special title treatment</h5>
                <a href="#" class="card-link">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
        <?php if(!$session) :?>
          <div class="mb-2">
            <div class="card">
              <div class="card-body">
                <div class="card mb-1 p-2">
                  <a href="login.php" class="btn btn-sm btn-success">Acceder</a>
                </div>
              </div>
            </div>
          </div>
        <?php endif ;?>
      </div>
      <div class="col-12 col-md-9 px-4 pe-md-5">
        <?php if($posts): ?>
          <?php foreach($posts as $post) :?>
              <div class="card mb-3 p-3">
                <img class="w-50 mb-3 rounded" src="<?php echo $post['img_url'];?>" alt="" >
                <div class="card-body">
                  <h5 class="card-title" style="text-transform:uppercase;"><?php echo $post['title'];?></h5>
                  <p class="text-muted"><small><?php echo translate_date($post['date']);?></small></p>            
                  <p class="card-text"><?php echo reduce_phrase($post['post_body'], 200, "...");?></p>
                  <a href="article.php?id=<?php echo $post['id'];?>" class='btn btn-primary'>Go somewhere</a>
                </div>
              </div>
          <?php endforeach ;?>
          <?php require('pagination.php') ;?>
        <?php elseif($page == 1) :?>
          <div class="jumbotron jumbotron-fluid">
             <div class="container">
               <h1 class="display-4">No hay ningun post</h1>
               <a class="lead" href="control_panel.php">Publique su primer post</a>
             </div>
          </div>
        <?php endif ;?>  
      </div>
    </div>
  </div>
</section>

<?php require('views/footer.view.php') ;?>
