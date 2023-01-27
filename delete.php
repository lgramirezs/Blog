<?php session_start();

require('config.php');
require('functions.php');

session_started();
$session = session();
$database = data_base($db_config);

if ($database) {
    $id = clear($_GET['id']);
    if (!$id) {
        header('Location: control_panel.php');        
    }else {
        $statement = $database->prepare('DELETE FROM posts WHERE id = :id');
        $statement->execute(array(
            'id' => $id
        ));
        header('Location: control_panel.php');        
    }
} else {
    echo 'Error al cargar la página';
    die();
};