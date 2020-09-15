<?php

  session_start();
  require 'includes/db.php';
  if (isset($_SESSION['user_id'])) {

  $message = '';

    if (!empty($_POST['title']) && !empty($_POST['clr']) && !empty($_POST['txt'])) {
      $sql = "INSERT INTO posits (Título, Color, Texto, UserID, RutaImg) VALUES (:title, :clr, :txt, :userID, :rutaImg)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':title', $_POST['title']);
      $stmt->bindParam(':clr', $_POST['clr']);
      $stmt->bindParam(':txt', $_POST['txt']);
      $stmt->bindParam(':rutaImg', $_FILES['img']['name']);
      $stmt->bindParam(':userID', $_SESSION['user_id']);

      if ($stmt->execute()) {
        $message = 'Se ha creado correctamente';
      } else {
        $message = 'Lo sentimos, ha habido un problema al crear el pósit';
      }

      //Datos imagen
      if(!empty($_FILES['img']['name'])){
        $nombre_img = $_FILES['img']['name'];
        $tipo_img = $_FILES['img']['type'];
        $tam_img = $_FILES['img']['size'];
        $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/Examen AW v2/img/';
        move_uploaded_file($_FILES['img']['tmp_name'], $carpeta.$nombre_img);
      }

    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nuevo pósit</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/web.css">
  </head>
  <body>

    <a href="posits.php"> Volver </a><br>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Nuevo pósit</h1>

    <form action="newPosit.php" method="POST" enctype="multipart/form-data">
      <input name="title" type="text" placeholder="Introduce el título del pósit">
      Color del pósit: <select name="clr">
       <option value="white">Blanco</option>
       <option value="red">Rojo</option>
       <option value="orange">Naranja</option>
       <option value="yellow">Amarillo</option>
       <option value="grey">Gris</option>
       <option value="blue">Azul</option>
       <option value="green">Verde</option>
    </select>
      <br><br><textarea name ="txt" rows="10" cols="50" placeholder="Introduce el texto del pósit"></textarea><br><br>
      Imagen adjunta: <input type="file" name="img" size="20"><br><br>
      <input type="submit" value="Añadir">
    </form>

  </body>
</html>