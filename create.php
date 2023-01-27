<?php session_start();

require('config.php');
require('functions.php');

session_started();
$session = session();
$database = data_base($db_config);

if ($database) {
    //
    $errors = [];
    //
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = clear($_POST['title']);
        $post_content = $_POST['post_content'];
        $file = $_FILES['file']['tmp_name'];

        if (!$title) {
            array_push($errors,'Agregue un título para esta publicación');
        }

        if (!$post_content) {
            array_push($errors,'Agregue el contenido para esta publicación');
        }

        if (!$file) {
            array_push($errors,'Adjunte la imagen de portada para este artículo');
        } else {
            $route = upload_file($_FILES['file'], $blog_config['uploads_directory'], $errors);
            if (!$route) {
                array_push($errors,'Adjunte una imagen');
            }   
        }

        if (empty($errors)) {
            $statement = $database->prepare('INSERT INTO posts(title,post_body,img_url) VALUES(:title,:post_body,:img_url);');
            $statement = $statement->execute(array(
                'title'     => $title,
                'post_body' => $post_content,
                'img_url'   => $route
            ));  
            $successfully = true;
            header('Location: control_panel.php');
        }

    }
} else {
    echo 'Error al cargar la página';
    die();
}


require('views/create.view.php');