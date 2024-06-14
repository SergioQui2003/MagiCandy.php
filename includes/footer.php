<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu título aquí</title>
    <!-- Enlace a FontAwesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        footer {
            background-color: #1d71b8;
            color: white;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .footer-section {
            flex: 1;
            margin: 0 10px;
            text-align: justify; /* Justificar el texto */
            margin-left: 160px;
        }
        .footer-section h3 {
            margin-bottom: 10px;
        }
        .footer-section p {
            margin-bottom: 8px;
        }
        .footer-link {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        .footer-link:hover {
            text-decoration: none;
        }
        .social-icons {
            display: flex;
            margin-top: 20px; /* Espacio superior */
        }
        .social-icons a {
            color: white;
            font-size: 24px;
            margin: 0 10px;
        }
        .social-icons a:hover {
            text-decoration: none;
        }
    </style>
</head>
<body>

<footer>
    <div class="footer-section">
        <h3>Horarios de atención</h3>
        <p>Lunes a Viernes: 8am - 7pm</p>
        <p>Sábados: 9am - 5pm</p>
    </div>
    <div class="footer-section">
        <h3>Contáctanos</h3>
        <p>Teléfono: <a href="tel:+15685472658" class="footer-link">313 3813 154 </a></p>
        <p>Email: <a href="mailto:magicandy2023@gmail.com" class="footer-link">magicandy2023@gmail.com</a></p>
    </div>
    <div class="footer-section">
        <h3>Visítanos</h3>
        <p><a href="https://goo.gl/maps/WFHVm9cFa2Y7uk5u7" class="footer-link">Calle 59 Barrio Santa Rita - Tunja, Boyacá</a></p>
        
        <!-- Iconos de redes sociales -->
        <div class="social-icons">
            <a href="https://wa.me/573133813154" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <a href="https://web.facebook.com/profile.php?id=100091925247816" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>

</body>
</html>
