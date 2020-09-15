<?php
  session_start();

  require 'includes/db.php';
  require 'includes/config.php';
  $positID = $_GET["positID"];
  $opcSel = $_GET["opcSel"];
  $carpeta = RUTA_APP.'img/';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT ID, Nombre, Contraseña FROM usuarios WHERE ID = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $users = $records->fetch(PDO::FETCH_ASSOC);

    $records = $conn->prepare("SELECT ID, UserID, Título, Texto, Color, RutaImg FROM posits WHERE ID = '$positID'");
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $posits = $records->fetchAll(PDO::FETCH_ASSOC);

    $user = null;

    if (count($users) > 0) {
      $user = $users;
    }

  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pósits UCM</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/web.css">
    <script src="assets/lib/jquery-3.5.1.min.js"></script>
  </head>
  <body>

    <?php if(!empty($user)): ?>
      <br><br>
      <a href="logout.php"> Cerrar sesión </a><br><br>
      <a href="posits.php"> Volver </a><br>
      <!-- Pósits -->
      <br><h4 class="txt"> Editar pósit: </h4>
        <?php
          foreach ($posits as $posit) {
        ?>
        <form action="includes/procUpdate.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="positID" value="<?php echo $posit['ID']?>">
          <input type="hidden" name="userID" value="<?php echo $posit['UserID']?>">
          <input type="text" name="title" value="<?php echo $posit['Título']?>" class = "table_input_1">
          <select name="clr">
           <option value="white" <?php if($opcSel=="white") echo "selected";?>>Blanco</option>
           <option value="red" <?php if($opcSel=="red") echo "selected";?>>Rojo</option>
           <option value="orange" <?php if($opcSel=="orange") echo "selected";?>>Naranja</option>
           <option value="yellow" <?php if($opcSel=="yellow") echo "selected";?>>Amarillo</option>
           <option value="grey" <?php if($opcSel=="grey") echo "selected";?>>Gris</option>
           <option value="blue" <?php if($opcSel=="blue") echo "selected";?>>Azul</option>
           <option value="green" <?php if($opcSel=="green") echo "selected";?>>Verde</option>
          </select><br><br>
          <textarea rows="12" cols="55" name="txt"><?php echo $posit['Texto']?></textarea><br><br>
          <input type="file" name="img">
          <br><br>
          <input type="submit" value="Actualizar" class = "table_submit">
        </form>
        <?php
          }
        ?>

    <?php endif; ?>

  </body>

</html>