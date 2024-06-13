<?php
include 'includes/session.php';

if(isset($_POST['add'])){
    $id = $_POST['id'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    $conn = $pdo->open();

    try {
        // Verificar si el producto ya está en el carrito
        $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id=:user AND product_id=:product");
        $stmt->execute(['user'=>$id, 'product'=>$product]);
        $row = $stmt->fetch();

        if($row){
            $_SESSION['error'] = 'El producto ya existe en el carrito';
        } else {
            // Agregar producto al carrito
            $stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user, :product, :quantity)");
            $stmt->execute(['user'=>$id, 'product'=>$product, 'quantity'=>$quantity]);

            $_SESSION['success'] = 'Producto agregado al carrito';

            // Actualizar cantidad vendida en la tabla de productos
            $stmt = $conn->prepare("UPDATE products SET quantity_sold = quantity_sold + :quantity WHERE id = :product_id");
            $stmt->execute(['quantity'=>$quantity, 'product_id'=>$product]);
        }
    } catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();

    header('location: cart.php?user='.$id);
}

?>
