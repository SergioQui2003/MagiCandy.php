<?php
include 'includes/session.php';

if(isset($_POST['update'])){
    $cartid = $_POST['cartid'];
    $userid = $_POST['userid'];
    $quantity = $_POST['quantity'];

    $conn = $pdo->open();

    try {
        // Actualizar la cantidad en el carrito
        $stmt = $conn->prepare("UPDATE cart SET quantity=:quantity WHERE id=:cartid");
        $stmt->execute(['quantity' => $quantity, 'cartid' => $cartid]);

        // Obtener el producto asociado al carrito
        $stmt = $conn->prepare("SELECT product_id FROM cart WHERE id=:cartid");
        $stmt->execute(['cartid' => $cartid]);
        $product_id = $stmt->fetchColumn();

        // Actualizar la cantidad vendida del producto
        $stmt = $conn->prepare("UPDATE products SET quantity_sold=quantity_sold+:quantity WHERE id=:product_id");
        $stmt->execute(['quantity' => $quantity, 'product_id' => $product_id]);

        $_SESSION['success'] = 'Cantidad en el carrito y cantidad vendida actualizadas correctamente';

    } catch(PDOException $e) {
        $_SESSION['error'] = 'Error al actualizar la cantidad en el carrito y cantidad vendida: ' . $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Rellene el formulario de actualización de cantidad primero';
}

header('location: cart.php?user=' . $userid);
?>
