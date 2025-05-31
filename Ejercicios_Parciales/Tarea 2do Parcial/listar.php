<?php include("conexion.php");

$sql="SELECT id,usuario,nombrecompleto,nivel FROM usuarios WHERE nivel=0 OR nivel =1";

$resultado=$con->query($sql);

?>
<table style="border-collapse: collapse" border="1" >
    <thead>
        <tr>
            <th width="100px">Correos</th>
            <th width="100px">Nombre Completo</th>
            <th width="60px">Nivel</th>
            <th width="10px">Operación</th>
        </tr>
    </thead>
    
 <?php 
 while($row=mysqli_fetch_array($resultado)){
    ?>
    <tr>
        <td><?php echo $row['usuario'];?></td>
        <td><?php echo $row['nombrecompleto'];?></td>
        <td><?php $clase = ($row['nivel'] == 0) ? "Usuario" : "Administrador";
                  echo $clase; ?></td>
        <td>
            <?php if($row['nivel']==0){ ?>
                <button><a href="javascript:formEditar(<?php echo $row['id'];?>)">Cambiar a administrador</a></button>
                <?php
                }else{ ?>
                <button><a href="javascript:formEditar(<?php echo $row['id'];?>)">Cambiar a usuario</a></button>
                <?php } ?> 
        </td>
    </tr>
    <?php } ?>
 </table>

 <a href="forminsertar.html"> Insertar</a>
 