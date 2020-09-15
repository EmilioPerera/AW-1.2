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
      <br><h4 class="txt">  ¿Quieres eliminar este pósit? </h4>
      <table id = "tabla2" border="1">
        <?php
          foreach ($posits as $posit) {
        ?>
        <th>Pósit</th><th>Texto</th>
        <tr>
          <td><?php echo $posit['Título']?></td>
          <td style="background-color: <?php echo $posit["Color"]; ?>; color: black;"><?php echo $posit['Texto']?><br>
          <?php if(!empty($posit['RutaImg'])){?>
            <img src="<?php echo $carpeta.$posit["RutaImg"]?>" id = "imgPosit"></td>
            <?php }?>
          </td>
        </tr>
        <?php
          }
        ?>
        </table>

    <?php endif; ?>

      <br><br><a href="includes/procDelete.php?positID=<?php echo $posit["ID"];?>"> Eliminar pósit </a><br><br>
      <a href="posits.php"> Cancelar </a><br>

  </body>

</html>