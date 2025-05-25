<?php
$conn = new mysqli("localhost", "root", "", "bd_biblioteca");
$res = $conn->query("SELECT id, imagen FROM libros");

echo '<table>';
$i = 0;
while ($row = $res->fetch_assoc()) {
    if ($i % 3 == 0) echo '<tr>';
    echo '<td>';
    echo "<button onclick=\"abrirModal('{$row['imagen']}')\">";
    echo "<img src='img/{$row['imagen']}' width='50' height='75'>";
    echo '</button>';
    echo '</td>';
    if ($i % 3 == 2) echo '</tr>';
    $i++;
}
if ($i % 3 != 0) echo '</tr>';
echo '</table>';
?>
