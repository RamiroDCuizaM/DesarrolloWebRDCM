<?php session_start();
$tipo = $_SESSION['tipo'];
echo "Nombre: ".$_SESSION['usuario']."<br>";
echo "Tipo: ".$_SESSION['tipo']."<br>";
?>
<a href="cerrarBD.php">Cerrar Sesion</a>

<?php
include("conexion.php");
$sql="SELECT producto, precio, imagen FROM productos ";

$resultado=$con->query($sql);

?>
<table style="border-collapse: collapse" border="1" >
    <thead>
        <tr>
            <th width="100px">Nro</th>
            <th width="100px">Fotografia</th>
            <th width="100px">Producto</th>
            <th width="100px">precio</th>
        </tr>
    </thead>
    
 <?php
 $cont = 1; 
 while($row=mysqli_fetch_array($resultado)){
    ?>
    <tr>
        <td><?php echo $cont;?></td>
        <td><img src="img/<?php echo $row['imagen'];  ?>" width="100px"></td>
        <td><?php echo $row['producto'];?></td>
        <td><?php echo $row['precio'];?></td>
    <?php 
    $cont++;
    } ?>
 </table>

 <a href="forminsertar.html"> Insertar</a>
 