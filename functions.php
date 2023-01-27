<?php

// Conexión a la base de datos 

function data_base($db_config)
{
  try {
    $connection = new PDO('mysql:host=localhost;dbname=' . $db_config['dbname'], $db_config['user'], $db_config['password']);
    return $connection;
  } catch (PDOException $e) {
    return false;
  }
};

function clear($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function reduce_phrase($text, $limit, $suffix)
{
  if (strlen($text) > $limit) {
    return substr($text, 0, $limit) . $suffix;
  } else {
    return $text;
  }
}

function currently_page()
{
  return (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
}

function posts($database, $postbypage)
{
  $init = (currently_page() < 1) ? 0 : (currently_page() * $postbypage) - $postbypage;
  //
  $post_query = $database->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM posts ORDER BY id DESC LIMIT $init, $postbypage");
  $post_query->execute(array());
  $posts = $post_query->fetchAll();
  //
  return $posts;
}

function user_query($database)
{
  $user_query = $database->prepare('SELECT * FROM users');
  $user_query->execute(array());
  $result = $user_query->fetch();

  return $result;
}

function session()
{
  if (!isset($_SESSION['admin'])) {
    return false;
  } else {
    return true;
  }
}

function session_started()
{
  if (!session()) {
		header('Location:  index.php');
	}
}

function upload_file($img, $dir, $errors) 
{
  $size = @getimagesize($img["tmp_name"]);
  if (empty($errors)) {
    //
    if ($size) {
      $route = $dir . $img['name'];
      move_uploaded_file($img['tmp_name'], $route);
      //
      return $route;
    }else {
      return false;
    }
  }

}

function query_post($database, $id) 
{
  $statement = $database->prepare('SELECT * FROM posts WHERE id = :id LIMIT 1');
  $statement->execute(array('id' => $id));
  $post = $statement->fetch();
  return $post;

}

function translate_date($date){
  $timestamp = strtotime($date);
  $months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

  $day = date('d', $timestamp);
  $month = date('m', $timestamp)-1;
  $year = date('Y', $timestamp);
  $dta = "$day de " . $months[$month]. " del $year";
  
  return $dta;
}