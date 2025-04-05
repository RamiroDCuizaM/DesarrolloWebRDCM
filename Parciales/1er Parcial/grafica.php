<?php
class grafica {
    public $item;
    public $color;
    public $color_fondo;
    public $imagen;

    public function __construct($item, $color, $color_fondo, $imagen) {
        $this->item = $item;
        $this->color = $color;
        $this->color_fondo = $color_fondo;
        $this->imagen = $imagen;
    }

    public function Cuadrado() {
        echo "<div style='background-color: {$this->color_fondo}; text-align: center; padding: 20px;'>";
        echo "<img src='{$this->imagen}' alt='imagen' width='200'><br><br>";
        $letras = str_split(strtoupper($this->item));
        foreach ($letras as $letra) {
            echo "<span style='color: {$this->color}; margin: 5px; font-weight: bold;'>{$letra}</span>";
        }
        echo "</div>";
    }

    public function Diagonal() {
        $letras = str_split(strtoupper($this->item));
        echo "<table>";
        for ($i = 0; $i < count($letras); $i++) {
            echo "<tr>";
            for ($j = 0; $j < $i; $j++) {
                echo "<td></td>";
            }
            echo "<td style='color: {$this->color}; background-color: {$this->color_fondo}; 
                        width: 30px; height: 30px; text-align: center; font-weight: bold;'>{$letras[$i]}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>
