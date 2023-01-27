<?php if(!empty($errors)) :?>
    <section id="error">
        <div class="card bg-danger p-4 mb-3">
            <?php foreach ($errors as $key => $error) {
                echo '<li class="text-white">' . $error . '</li>'; 
            }
            ;?>
        </div>
    </section>
<?php endif ;?>

