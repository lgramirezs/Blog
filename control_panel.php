<?php session_start();

require('config.php');
require('functions.php');

session_started();
$session = session();
$database = data_base($db_config);

if ($database) {
    $posts = posts($database ,$blog_config['postbypage']);
    //paginación
    $page = currently_page();
    $total_posts = $database->query('SELECT FOUND_ROWS() AS total');
    $total_posts = $total_posts->fetch()['total'];
    $pages =  (int)ceil($total_posts / $blog_config['postbypage']);
} else {
    echo 'Error al cargar la página';
    die();
}


require('views/control_panel.view.php');