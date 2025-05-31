<?php
class examen {
    private $n;
    private $cadena;
    private $a, $b, $c;

    public function __construct($n, $cadena, $a, $b, $c) {
        $this->n = $n;
        $this->cadena = $cadena;
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function calcularFibonacci() {
        $fib = [0, 1];
        for ($i = 2; $i < $this->n; $i++) {
            $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
        }

        echo "Serie Fibonacci hasta {$this->n}: <br>";
        for ($i = 0; $i < $this->n; $i++) {
            echo "<option>{$fib[$i]}</option>";
        }
    }

    public function calcularMayor() {
        $mayor = max($this->a, $this->b, $this->c);
        echo "Números ingresados: $this->a, $this->b, $this->c <br>";
        echo "El número mayor es: <b>$mayor</b><br>";
    }

    public function piramide() {
        $long = strlen($this->cadena);
        echo "PIRÁMIDE de la cadena '{$this->cadena}':<br>";
    
        for ($i = 1; $i <= $long; $i++) {
            echo substr($this->cadena, 0, $i) . "<br>";
        }
    }    
}
?>