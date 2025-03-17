<?php
$fila = $_GET['fila'];
$columna = $_GET['columna'];
$filae = $_GET['filae'];
$columnae = $_GET['columnae'];
?>
<style>
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }
        td {
            width: 60px;
            height: 60px;
            text-align: center;  
            border: 1px solid black;  
        }
        .blanco {
            background-color: white;
        }
        .escogido {
            background-color: <?php echo $_GET['color']; ?>;
        }
        .especial {
            background-color: yellow
        }
    </style>
<table>
    <?php for($i=1;$i<=$fila;$i++){?>
        <tr>
          <?php for($j=1;$j<=$columna;$j++){
              if($i == $filae && $j == $columnae){?>
              <td class="especial"><img src="Bowser.png" width="50px"></td>
              <?php } 
              else{ 
                $clase = (($i + $j) % 2 == 0) ? "blanco" : "escogido"; ?>
                <td class=<?php echo $clase; ?>></td>
                <?php }  
                   
            } ?>
        </tr>
        <?php } ?>

</table>