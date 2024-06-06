<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu título aquí</title>
    <link rel="stylesheet" href="wasathpp.css">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            background-color: #0084ff; /* Fondo azul */
            color: white; /* Texto blanco */
            padding: 20px;
            width: 100%; /* Ancho del contenedor al 100% */
        }
        .column {
            width: 30%; /* Ajusta el ancho según necesites */
            padding: 20px;
        }
        .footer-link {
            color: white !important; /* Forzar el color blanco */
        }
    </style>
</head>
<body>

<footer class="main-footer">
    <div class="container">
        <div class="column">
            <h5 class="text-uppercase mb-4">Horarios</h5>
            <hr class="mb-4">
            <p>
                Lunes a Viernes <br>
                8am - 7pm <br><br>
                Sábados <br>
                9am - 5pm
            </p>
        </div>

        <div class="column">
            <h5 class="text-uppercase mb-4">Contáctanos</h5>
            <hr class="mb-4">
            <p><a href="contacto.php" class="footer-link">Formulario para contactarnos</a></p>
            <p><a href="error500.html" class="footer-link">Política de privacidad</a></p>
            <p><a href="error404.html" class="footer-link">Conoce más...</a></p>
        </div>

        <div class="column">
            <h5 class="text-uppercase mb-4">Nuestros datos</h5>
            <hr class="mb-4">
            <p><i class="bi bi-house-fill"> <a href="https://goo.gl/maps/WFHVm9cFa2Y7uk5u7" style="text-decoration: none; color: white;">Calle 59 Barrio Santa Rita - Tunja Boyacá</a></i></p>
            <p><i class="bi bi-phone-fill"> <a href="#" style="color: white;"> 568 547 2658</a></i></p>
            <p><i class="bi bi-envelope-at-fill"> <a href="#" style="color: white;">magicandy2023@gmail.com</a></i></p>
        </div>
    </div>
    <!-- Icono de WhatsApp -->
    <a href="https://web.whatsapp.com/" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float" style="color: white;"></i>
    </a>
</footer>

</body>
</html>
