<?php
require('config.php');
require('functions.php');

$database = data_base($db_config);

if ($database) {
    //
    if (!empty(user_query($database))) {
        header('Location: index.php');
        die();
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = [];
        //
        $user = strtolower(clear($_POST['user']));
        $password = $_POST['password'];
        $email = $_POST['email'];
        //
        if (empty($user)) {
            array_push($errors, 'El campo usuario es obligatorio');
        }
        //
        if (empty($password)) {
            array_push($errors, 'El campo contraseña es obligatorio');
        } else {
            $password = hash('sha512', $password);
        }
        if (empty($email)) {
            array_push($errors, 'El campo email es obligatorio');
        } else {
            $zanitize_email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, 'Dirección de correo no valida');
            }
        }

        if (empty($errors)) {
            //
            $statement = $database->prepare('INSERT INTO users(user_login,user_pass,user_email) VALUES(:user,:password,:email);');
            $statement->execute(array(
                'user' => $user,
                'password' => $password,
                'email' => $email
            ));
            //
            $successfully = true;
            //
            header('Location: login.php');
        }
    }
} else {
    echo 'Error al cargar la página';
    die();
}

require('views/sigin.view.php');
