<?php
session_start();

// Obtener los datos del formulario
$cantidades = $_POST['cantidad'];
$productosIds = $_POST['producto_id'];

// Procesar los datos y actualizar el carrito
for ($i = 0; $i < count($cantidades); $i++) {
    $cantidad = $cantidades[$i];
    $productoId = $productosIds[$i];
    // Aquí puedes realizar la lógica para agregar, eliminar o actualizar los productos en el carrito
    // Por ejemplo, puedes almacenar los productos en una variable de sesión
    $_SESSION['carrito'][$productoId] = $cantidad;
}

// Verificar si el carrito está vacío
if (empty($_SESSION['carrito'])) {
    // El carrito está vacío, redirigir al carrito nuevamente con un mensaje
    $_SESSION['carrito_vacio'] = true;
    header("Location: cart.html");
    exit;
}

// Redireccionar al carrito nuevamente
header("Location: cart.html");
exit;
?>


