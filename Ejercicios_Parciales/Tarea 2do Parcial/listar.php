<?php include("conexion.php");

$sql="SELECT id,usuario,nombrecompleto,nivel FROM usuarios WHERE nivel=0 OR nivel =1";

$resultado=$con->query($sql);

?>
<style>
    .color{
        background-color:#D9E1F3;
    } 
    .blanco{
        background-color:white;
    }

</style>
<table style="border-collapse: collapse" border="1" >
    <thead>
        <tr>
            <th style="width:100px; background-color:#001F5E; color:white;">Correos</th>
            <th style="width:150px; background-color:#001F5E; color:white;">Nombre Completo</th>
            <th style="width:100px; background-color:#001F5E; color:white;">Nivel</th>
            <th style="width:200px; background-color:#001F5E; color:white;">Operación</th>
        </tr>
    </thead>
    
 <?php 
 $n=0;
 while($row=mysqli_fetch_array($resultado)){
    if($n%2==0){
        $clase = 'color';
    }else{ $clase = 'blanco';}
    $n++;
    ?>
    <tr class="<?php echo $clase;?>">
        <td><?php echo $row['usuario'];?></td>
        <td><?php echo $row['nombrecompleto'];?></td>
        <td><?php $clase = ($row['nivel'] == 0) ? "Usuario" : "Administrador";
                  echo $clase; ?></td>
        <td>
            <?php if($row['nivel']==0){ ?>
                <button style="background-color:#EC7C30;"><a href="javascript:formEditar(<?php echo $row['id'];?>)" style="color:white;">Cambiar a administrador</a></button>
                <?php
                }else{ ?>
                <button style="background-color:#B6B6B6;"><a href="javascript:formEditar(<?php echo $row['id'];?>)" style="color:white;">Cambiar a usuario</a></button>
                <?php } ?> 
        </td>
    </tr>
    <?php } ?>
 </table>

 