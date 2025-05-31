<?php
include "conexion.php";

$sql = "SELECT id, imagen FROM `libros`;";
$resultado = $con->query($sql);

if ($resultado) { 
    
    while ($imagen = $resultado->fetch_assoc()) {
            ?>
            <button style="width: 75px; height: 100px; margin:20px 30px 10px"  onclick="modal(<?php echo $imagen['id']?>)"> <img src="images/<?php echo $imagen['imagen'] ?>" style="width: 75px; height: 100px;"></button>
            <?php
            } ?>    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <button class="close" onclick="cerrarModal()">Aceptar</button>
            <div id="data">
            </div>
            
        </div>
    </div>
    <script src="ajax.js"></script>
    <link rel="stylesheet" href="estilos.css">
<?php
} else {
    echo "no esta registrado";
}
?>