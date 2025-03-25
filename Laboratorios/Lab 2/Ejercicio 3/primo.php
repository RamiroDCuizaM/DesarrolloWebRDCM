<?php
class Primo {
    public function esPrimo($num) {
        if ($num < 2) return false;
        for ($i = 2; $i * $i <= $num; $i++) {
            if ($num % $i == 0) return false;
        }
        return true;
    }

    public function generarPrimos($cantidad) {
        $primos = [];
        $num = 2;
        while (count($primos) < $cantidad) {
            if ($this->esPrimo($num)) {
                $primos[] = $num;
            }
            $num++;
        }
        return $primos;
    }
}
?>