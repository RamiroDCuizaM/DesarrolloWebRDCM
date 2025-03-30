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
$sql="SELECT id,nombres, apellidos, correo FROM usuarios"; 
if(isset ($_GET['ordenar'])){
    $sql.=" order by ".$_GET['ordenar'];
}
$resultado=$con->query($sql);

?>
<table>
        <tr>
           <th><a href="pregunta4.php?ordenar=nombres" class="a">Nombres</a></th>
           <th><a href="pregunta4.php?ordenar=apellidos" class="a">Apellidos</a></th>
           <th><a href="pregunta4.php?ordenar=correo" class="a">Correo</a></th>
        </tr>
 <?php 
 $cont = 0;
 while($row=mysqli_fetch_array($resultado)){
    if($cont%2==0){?>
    <tr class="<?php echo "blanco";?>">
        <td><?php echo $row['nombres'];?></td>
        <td><?php echo $row['apellidos'];?></td>
        <td><a href="form_editar_correo.php?id=<?php echo $row['id'];?>"><?php echo $row['correo'] ?></a></td>
    </tr><?php }else{?>
    <tr class="<?php echo "amarillo";?>">
        <td><?php echo $row['nombres'];?></td>
        <td><?php echo $row['apellidos'];?></td>
        <td><a href="form_editar_correo.php?id=<?php echo $row['id'];?>"><?php echo $row['correo'] ?></a></td>
    </tr>
        <?php }
        $cont++;
        ?>
    <?php } ?>
 </table>
</body>
</html>
