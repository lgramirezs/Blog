<?php session_start();

require('config.php');
require('functions.php');

if(session()){
    header('Location: index.php');
    die();
}

$database = data_base($db_config);

if($database) {
    $errors = [];
    //
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //
        $user = strtolower(clear($_POST['user']));
        $password = $_POST['password'];

        if (empty($user)) {
            array_push($errors, 'El nombre de usuario es obligatorio');
        }

        if (empty($password)) {
            array_push($errors, 'La contraseña es obligatoria');
        } else {
            $password = hash('sha512', $password );
        }

        if (empty($errors)) {
            $stament = $database->prepare('SELECT * FROM users WHERE user_login = :user AND user_pass = :password LIMIT 1');
            $stament->execute(array(
                ':user' => $user,
                'password' => $password
            ));
            $result = $stament->fetch();

            if (empty($result)) {
                array_push($errors, 'Los datos ingresados no coinciden con nuestros registros');
            }else {
                $_SESSION['admin'] = $user;
                header('Location: control_panel.php');
            }
        }

    }

}else {
    echo 'Error al cargar la página';
    die();
}

require('views/login.view.php');



