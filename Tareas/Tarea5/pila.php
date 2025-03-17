<?php 
class Pila {
    private $elementos = [];
    private $tope = 0;

    public function __construct() {
        if (!isset($_SESSION['pila'])) {
            $_SESSION['pila'] = [];
        }
        $this->elementos = &$_SESSION['pila'];
        $this->tope = count($this->elementos);
    }

    public function insertar($elemento) {
        $this->elementos[] = $elemento;
        $this->tope = count($this->elementos);
    }

    public function eliminar() {
        if ($this->tope > 0) {
            $eliminado = array_pop($this->elementos);
            $this->tope = count($this->elementos);

            return $eliminado;
        }
        return "La pila está vacía";
    }

    public function mostrar() {
        if ($this->tope > 0) {
            echo "<h3>Elementos en la Pila:</h3>";
            foreach ($this->elementos as $elemento) {
                echo "$elemento<br>";
            }
        } else {
            echo "La pila está vacía";
        }
    }
}
?>
