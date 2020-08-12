<?php
if (empty($_GET)) {
    return 'Get пустой';
}

if (empty($_GET['operation'])) {
    return 'операция не передана';
}

if ($_GET['x1'] === '' || $_GET ['x2'] === '') {
    return 'x1 || x2 пустой';
}

if (!is_numeric($_GET['x1']) || !is_numeric($_GET['x2'])) {
    return 'x1 или x2 являются строкой';
}

$x1 = $_GET['x1'];
$x2 = $_GET['x2'];


$operation = $_GET ['operation'];

/* мой пример
if ($operation === '+') {
    $result = $x1 + $x2;
} else {
    $result = $x1 - $x2;
}
*/
switch ($operation) {
    case '+':
        $result = $x1 + $x2;
        break;
    case '-' :
        $result = $x1 - $x2;
        break;
    case '/' :
        $result = $x2 != 0 ? ($x1 / $x2) : 'делить на ноль нельзя';
        break;
    case '*' :
        $result = $x1 * $x2;
        break;
    default:
        return 'операция не поддерживается';
}

$expression = $x1 . ' ' . $operation . ' ' . $x2 . ' = ' . $result;

return $expression;

