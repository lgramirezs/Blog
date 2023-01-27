<?php session_start();

require('config.php');
require('functions.php');

session_started();
$session = session();
$database = data_base($db_config);

if ($database) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = [];
        $id = clear($_POST['id']);
        $title = clear($_POST['title']);
        $post_content = $_POST['post_content'];
        $file = $_FILES['file'];
        $file_tmp = $_POST['file_tmp'];


        if (empty($file['name'])) {
            $route = $file_tmp;
        } else {
            $route = upload_file($file, $blog_config['uploads_directory'], $errors);
            if (!$route) {
                array_push($errors, 'Adjunte una imagen');
            }
        }

        $statement = $database->prepare('UPDATE posts SET title = :title, post_body = :post_content, img_url= :img_url WHERE id = :id');
        $statement->execute(array(
            'id' => $id,
            'title' => $title,
            'post_content' => $post_content,
            'img_url' => $route,
        ));

        if (empty($errors)) {
            header('Location: show.php?id='. $id);
        }

    } else {
        //
        $id = (int)clear($_GET['id']);
        if (empty($id)) {
            header('Location: control_panel.php');
        }
        $post = query_post($database, $id);
        if (empty($post)) {
            header('Location: control_panel.php');
        }
    }
} else {
    echo 'Error al cargar la página';
    die();
}


require('views/edit.view.php');
