<?php
    function calcularporcentajeproducto($impuesto,$precio) {
        $divisor = 100;
        $cuota = $impuesto * $precio / $divisor;
        $total = $precio + $cuota;
        return $total;
    };
?>