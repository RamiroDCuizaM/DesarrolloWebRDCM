<?php
include("conexion.php");

$orden = isset($_GET['orden']) ? $_GET['orden'] : 'titulo';
$asc = isset($_GET['ascendente']) && $_GET['ascendente'] === 'desc' ? 'desc' : 'asc';

$sql = "SELECT id, imagen, titulo FROM libros ORDER BY $orden $asc";
$resultado = $con->query($sql);
?>

<table style="border-collapse: collapse;" border="1">
    <thead>
        <tr>
            <th width="100px">Imagen</th>
            <th width="200px">
                <a href="#" onclick="ordenarPorTitulo('<?php echo $asc === 'asc' ? 'desc' : 'asc'; ?>')">Título</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><img src="images/<?php echo $row['imagen']; ?>" style="width: 30px; height: 40px;"></td>
            <td><?php echo $row['titulo']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script src="ajax.js"></script>
