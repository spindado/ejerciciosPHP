<?php
function hola(): string
{
    return "hola";
}
echo hola();

function adios(): string
{
    return "adios";
}
$adios = adios();
echo $adios();

function griting(string $persona): string
{
    return "holas" . $persona;
}

echo griting("pepe");

function integer_div(...$ints): int
{
    return intdiv($ints[0], $ints[1]);
}
echo integer_div(10, 5);

function recorrer_usuarios_list($usuarios): string
{
    $result = "";
    foreach ($usuarios as $usuario) {
        list($nombre, $apellido) = $usuario; // $usuario es un array
        $result .= "<br>{$nombre}  {$apellido}";
    }
    return $result;
}
$complejo = [
    ["israel", "parra"],
    ["juan", "lópez"],
    ["sofia", "garcía"],
    ["daniel", "jimenez"]
];
echo recorrer_usuarios_list($complejo);