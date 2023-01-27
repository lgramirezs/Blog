<?php require('views/landing.view.php'); ?>

<section>
    <div class="container-fluid p-5">
        <div class="card p-5 mb-2">
            <h1 style="text-transform:uppercase;" class="card-title mb-4 h4"><?php echo $post['title'];?></h1>
            <img src="./<?php echo $post['img_url'];?>" class="card-img-top w-75 mb-2" >
            <p class="text-muted"><small><?php echo translate_date($post['date']);?></small></p>
            <div class="card-body">
                <p class="card-text"><?php echo nl2br($post['post_body']) ;?></p>
            </div>
        </div>
    </div>
</section>

<?php require('views/footer.view.php'); ;?>
