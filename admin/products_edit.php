<?php
include 'includes/session.php';
include 'includes/slugify.php';

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $slug = slugify($name);
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $quantity_in = $_POST['quantity_in']; // Recibe la cantidad de entrada desde el formulario

    $conn = $pdo->open();

    try {
        $stmt = $conn->prepare("UPDATE products SET name=:name, slug=:slug, category_id=:category, price=:price, description=:description, quantity_in=:quantity_in WHERE id=:id");
        $stmt->execute(['name'=>$name, 'slug'=>$slug, 'category'=>$category, 'price'=>$price, 'description'=>$description, 'quantity_in'=>$quantity_in, 'id'=>$id]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['success'] = 'Producto actualizado con éxito';
        } else {
            $_SESSION['error'] = 'No se pudo actualizar el producto';
        }
    } catch(PDOException $e) {
        $_SESSION['error'] = 'Error al actualizar el producto: ' . $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Rellene el formulario de edición del producto primero';
}

header('location: products.php');
?>
