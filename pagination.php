<section id="pagination">
    <div class="d-flex justify-content-center my-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($page > 1): ?>
                  <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1;?>">Anterior</a></li>
                <?php else:?>
                  <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                <?php endif;?>
                <?php 
                  for ($i=1; $i <= $pages; $i++) { 
                    if($i == $page){
                      echo "<li class='page-item active'><a class='page-link' href='?page=$i'>$i</a></li>";
                    } else {
                      echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                    }
                  } 
                ;?>
                <?php if($page == $pages): ?>
                  <li class="page-item disabled"><a class="page-link" href="#">Siguiente</a></li>
                <?php else :?>
                  <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1;?>">Siguiente</a></li>
                <?php endif;?>
            </ul>
        </nav>
    </div>
</section>