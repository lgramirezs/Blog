<?php require('views/landing.view.php'); ?>

<section>
    <div class="container-fluid p-5">
        <h1 class="h3"><?php echo $title;?></h1>
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
        <?php endif;?>
    </div>
</section>

<!-- <?php require('views/footer.view.php');?> -->
