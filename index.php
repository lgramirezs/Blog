<?php session_start(); 

require('config.php');
require('functions.php');

$database = data_base($db_config);

if ($database) {
    //
    if (empty(user_query($database))) {
        header('Location: sigin.php');
    } else {
        $posts = posts($database ,$blog_config['postbypage']);
        //paginación
        $page = currently_page();
        $total_posts = $database->query('SELECT FOUND_ROWS() AS total');
        $total_posts = $total_posts->fetch()['total'];
        $pages =  (int)ceil($total_posts / $blog_config['postbypage']);
        //
        $session = session();
    }

} else {
    // header('Location: error.php');
    echo 'Error al cargar la página';
    die();
}


require('views/index.view.php');