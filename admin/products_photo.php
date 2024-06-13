<?php
include 'includes/session.php';

if(isset($_POST['upload'])) {
    $id = $_POST['id'];
    $filename = $_FILES['photo']['name'];
    $new_filename = '';

    if(!empty($filename)) {
        $conn = $pdo->open();

        try {
            // Obtener información del producto
            $stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
            $stmt->execute(['id'=>$id]);
            $row = $stmt->fetch();

            // Mover archivo cargado a la carpeta de imágenes
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $new_filename = $row['slug'] . '_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $new_filename);

            // Actualizar la foto del producto en la base de datos
            $stmt = $conn->prepare("UPDATE products SET photo=:photo WHERE id=:id");
            $stmt->execute(['photo'=>$new_filename, 'id'=>$id]);

            $_SESSION['success'] = 'Foto del producto actualizada con éxito';
        }
        catch(PDOException $e) {
            $_SESSION['error'] = 'Error al actualizar la foto del producto: ' . $e->getMessage();
        }

        $pdo->close();
    } else {
        $_SESSION['error'] = 'Seleccione un archivo de imagen válido';
    }
}
else {
    $_SESSION['error'] = 'Seleccione el producto para actualizar la foto primero';
}

header('location: products.php');
?>
