<?php

if (isset($_GET["nombre"])) {
    $nombre = $_GET["nombre"];
}

if (isset($_GET["numero"])) {
    $numero = $_GET["numero"];
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

try
  {
    require_once("funciones/bd_conexion.php");
        $sql = "UPDATE `Contactos` SET ";
        $sql .= "`Nombre` = '{$nombre}', ";
        $sql .= "`Telefono` = '{$numero}' ";
        $sql .= "WHERE `id` = '{$id}' ";


    $resultado = $conn->query($sql);
  }
  catch(Exception $e)
    {
      $error = $e->getMessage();
    }

?>



<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>Agenda PHP</title>
    <link rel="stylesheet" href="css/estilos.css" media="screen">
  </head>
  <body>
    <div class="contenedor">
      <h1>Agenda de Contactos</h1>

      <div class="contenido">
          <?
            if ($resultado) {
              echo "Contaco Actualizado";
            }
            else
            {
              echo "Error " .$conn->error;
            }
          ?>
          <br>
          <a class="volver" href="index.php">Volver a Inicio</a>
    </div>
  <?php
      $conn->close();
  ?>

  </body>
</html>