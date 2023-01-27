<?php session_start();

require('config.php');
require('functions.php');

$session = session();
$database = data_base($db_config);

if ($database) {
    if (empty($_GET['search'])) {
        $title = "Ingrese su busqueda sobre el campo de texto del buscador";
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['search']) ) {
        $search = clear($_GET['search']);

        $statement = $database->prepare('SELECT * FROM posts WHERE title LIKE :search or post_body LIKE :search');
        $statement->execute(array(
             'search' => "%$search%" 
        ));
        $posts = $statement->fetchAll();

        if (empty($posts)) {
            $title = 'No se encontro nada relacionado con la busqueda: ' . $search;
        } else {
            $title = 'Resultados de la busqueda: ' . $search;
        }
        
    }else {
        header('Location index.php');
    }
} else {
    echo 'Error al cargar la página';
    die();
}

require('views/search.view.php');