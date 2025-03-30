<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    include("conexion.php"); 
    $id=$_GET['id'];
    $sql="SELECT id, nombres, apellidos, correo FROM usuarios WHERE id=$id";
    $resultado=$con->query($sql);
    $row = $resultado->fetch_assoc();
    ?>
    <form action="editar.php" method="post" class="contenedor">
        <br><br>
        <label for="nombres">Nombres y Apellidos:</label>
        <label ><b><?php echo $row['nombres']." ".$row['apellidos']; ?></b></label>
        <br><br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" class="correo" value="<?php echo $row['correo'];?>">
        <br><br><br>
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <input type="submit" class="actualizar" value="Actualizar">

    </form>
    
</body>
</html>