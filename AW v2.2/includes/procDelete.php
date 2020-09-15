<?php
  session_start();

  require 'db.php';
  $positID = $_GET["positID"];
      $sql = "DELETE FROM posits WHERE ID = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id', $positID);

      if ($stmt->execute()) {
        $message = 'Se ha eliminado correctamente';
      } else {
        $message = 'Lo sentimos, ha habido un problema al eliminar el pósit';
      }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pósits UCM</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/web.css">
    <script src="assets/lib/jquery-3.5.1.min.js"></script>
  </head>
  <body>
    <h1>Se ha eliminado correctamente</h1>
    <a href="../posits.php">Volver</a>
  </body>

</html>