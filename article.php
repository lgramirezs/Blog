<?php session_start();

require('config.php');
require('functions.php');

$session = session();
$database = data_base($db_config);

if ($database) {
    if ($_GET['id']) {
        $id = (int)clear($_GET['id']);
        $post = query_post($database,$id);
        if (!$post) {
            header('Location: index.php');
        }
    } else {
        header('Location: index.php');
    }
} else {
    echo 'Error al cargar la página';
    die();
}

require('views/article.view.php');
