<?php session_start();
include("conexion.php");

// Corrección aquí ↓
$orden = isset($_GET['orden']) ? $_GET['orden'] : 'titulo'; // Valor por defecto
$asente = (isset($_GET['asendente']) && $_GET['asendente'] == 'desc') ? 'desc' : 'asc';
$siguiente_orden = ($asente == 'asc') ? 'desc' : 'asc';

$sql = "SELECT libros.id as id, libros.imagen as imagen, libros.titulo as titulo, libros.autor as autor,
        editoriales.editorial as editorial, libros.anio as anio 
        FROM libros
        LEFT JOIN editoriales ON libros.ideditorial=editoriales.id 
        ORDER BY $orden $asente";

$resultado=$con->query($sql);

// Verifica si la consulta fue exitosa ↓
if (!$resultado) {
    die("Error en la consulta: " . $con->error);
}

?>
<style>
    table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    text-align: left;
}

thead {
    background-color: #002d6e; /* Azul oscuro */
    color: white;
}

thead th {
    padding: 10px;
}

tbody tr:nth-child(even) {
    background-color: #e6eef7; /* Azul muy claro */
}

tbody tr:nth-child(odd) {
    background-color: white;
}

td {
    padding: 10px;
    vertical-align: middle;
}

td img {
    display: block;
    margin: auto;
    border-radius: 4px;
}

a {
    color: white;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
</style>

<h2>Lista de Libros</h2>
<table style="border-collapse: collapse" border="1" >
    <thead>
        <tr>
            <th >Imagen</th>
            <th><a href="pregunta4.php?orden=titulo&asendente=<?php echo $siguiente_orden ?>">Titulo</a></th>
            <th><a href="pregunta4.php?orden=autor&asendente=<?php echo $siguiente_orden ?>">Autor</a></th>
            <th><a href="pregunta4.php?orden=editorial&asendente=<?php echo $siguiente_orden ?>">Editorial</a></th>
            <th><a href="pregunta4.php?orden=anio&asendente=<?php echo $siguiente_orden ?>">Año</a></th>
           <?php if($_SESSION['nivel']==1){?>
            <th>Operacion</th>
            <?php } ?>
        </tr>
    </thead>
    
 <?php 
 while($row=mysqli_fetch_array($resultado)){
    ?>
    <tr>
        <td><img src="PrimerParcial/images/<?php echo $row['imagen'];  ?>" width="50px"></td>
        <td><?php echo $row['titulo'];?></td>
        <td><?php echo $row['autor'];?></td>
        <td><?php echo $row['editorial'];?></td>
        <td><?php echo $row['anio'];?></td>
        <?php if($_SESSION['nivel']==1){?>
        <td><a href="delete.php?id=<?php echo $row['id'];?>">Eliminar</a> </td>
        <?php } ?>
    </tr>
    <?php } ?>
 </table>
 