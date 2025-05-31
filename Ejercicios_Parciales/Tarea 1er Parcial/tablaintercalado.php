<?php
$fila = $_POST['fila'];
$columna = $_POST['columna'];
?>
<style>
    .rojo{
        background-color:red;
    }
    .amarillo{
        background-color:yellow;
    }
    .verde{
        background-color:#00AF50;
    }
    td{
        width: 100px;
        height: 30px; 
        border: 2px solid black;
    }
    table{
        border-collapse: collapse;
    }
</style>
<table>
    <?php
    for($i=1;$i<=$fila;$i++){ 
        if($i%3==1){
            $clase = 'rojo';
        }
        if($i%3==2){
            $clase = 'amarillo';
        }
        if($i%3==0){
            $clase = 'verde';
        }
        ?>
        <tr class="<?php echo $clase; ?>">
            <?php for($j=1;$j<=$columna;$j++){?>
                <td></td>
            <?php } ?>    
        </tr>

    <?php 
    }
    ?>
</table>