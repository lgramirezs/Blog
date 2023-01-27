<?php session_start();

require('config.php');
require('functions.php');

$session = session();
$database = data_base($db_config);

if (!$session) {
    header('Location: index.php');
}elseif ($database) {
    if ($_GET['id']) {
        $post = query_post($database,(int)$_GET['id']);
    } else {
        header('Location: control_panel.php');
    }
} else {
    echo 'Error al cargar la página';
    die();
}

require('views/show.view.php');