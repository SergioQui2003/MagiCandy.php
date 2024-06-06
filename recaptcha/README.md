## Descripción
reCAPTCHA es un servicio gratuito de CAPTCHA que protege los sitios web contra el spam y el abuso. Este es un código creado por Google que proporciona complementos para la integración de terceros con reCAPTCHA.
## Instalación
### Composer (Recomendado)
[Composer](https://getcomposer.org/) es un administrador de dependencias ampliamente utilizado para paquetes PHP. Este cliente de reCAPTCHA está disponible en Packagist como [`google/recaptcha`](https://packagist.org/packages/google/recaptcha) y puede ser instalado ya sea ejecutando el comando `composer require` o agregando la biblioteca a tu `composer.json`.
Para agregar esta dependencia usando el comando, ejecuta lo siguiente desde dentro de tu directorio de proyecto:
```
composer require google/recaptcha "~1.1"
```
Alternativamente, agrega la dependencia directamente a tu archivo `composer.json`:
```json
"require": {
    "google/recaptcha": "~1.1"
}
```
### Descarga directa (sin Composer)
Si deseas instalar la biblioteca manualmente (es decir, sin Composer), puedes usar los enlaces en la página principal del proyecto para clonar el repositorio o descargar el [archivo ZIP](https://github.com/google/recaptcha/archive/master.zip). Una vez descargado, puedes utilizar el script de autoloader proporcionado en `src/autoload.php` en lugar del `vendor/autoload.php` de Composer.
### Uso
Primero, registra claves para tu sitio en https://www.google.com/recaptcha/admin
Cuando tu aplicación reciba un envío de formulario que contenga el campo `g-recaptcha-response`, puedes verificarlo usando:
```php
<?php
$recaptcha = new \ReCaptcha\ReCaptcha($secret);
$resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
if ($resp->isSuccess()) {
    // ¡verificado!
} else {
    $errores = $resp->getErrorCodes();
}
```