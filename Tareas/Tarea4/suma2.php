<?php
$a = $_GET['a'];
$b = $_GET['b'];
$resultado = $a+$b;
?>
<link rel="stylesheet" href="style.css">
<table>
    <tr>
        <td class="verde"><?php echo $a ?></td>
        <td class="blanco">+</td>
        <td class="verde"><?php echo $b ?></td>
        <td class="blanco">=</td>
        <td class="verde"><?php echo $resultado ?></td>
    </tr>
</table>