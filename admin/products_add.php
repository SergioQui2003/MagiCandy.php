<?php
session_start();
include 'includes/session.php';
include 'includes/slugify.php';

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $slug = slugify($name);
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $quantity_in = $_POST['quantity_in'];
    $filename = $_FILES['photo']['name'];

    $conn = $pdo->open();

    try {
        // Verificar si ya existe un producto con el mismo slug
        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE slug=:slug");
        $stmt->execute(['slug'=>$slug]);
        $row = $stmt->fetch();

        if($row['numrows'] > 0){
            $_SESSION['error'] = 'Producto ya existe';
        } else {
            // Subir la foto si se proporciona
            if(!empty($filename)){
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $new_filename = $slug.'.'.$ext;
                move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);    
            } else {
                $new_filename = '';
            }

            // Insertar el producto en la base de datos
            $stmt = $conn->prepare("INSERT INTO products (category_id, name, description, slug, price, photo, quantity_in) 
                                    VALUES (:category, :name, :description, :slug, :price, :photo, :quantity_in)");
            $stmt->execute(['category'=>$category, 'name'=>$name, 'description'=>$description, 
                            'slug'=>$slug, 'price'=>$price, 'photo'=>$new_filename, 'quantity_in'=>$quantity_in]);
            $_SESSION['success'] = 'Producto agregado exitosamente';
        }
    } catch(PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Rellene el formulario del producto primero';
}

header('location: products.php');
?>
