<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\SendNotificationMail;

// Asegúrate de cargar el autoload de Composer y el entorno de Laravel
require __DIR__.'/../vendor/autoload.php';

// Inicializar la aplicación Laravel manualmente
$app = require_once __DIR__.'/../bootstrap/app.php';

// Iniciar el kernel de consola de Laravel
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Ejecutar el kernel de consola para inicializar las facades
$kernel->bootstrap();

// Obtener la lista de archivos modificados como argumento desde el script Bash
$changes = isset($argv[1]) ? $argv[1] : '';

// Enviar el correo usando Laravel
if (!empty($changes)) {
    Mail::to('code.bit.mau@gmail.com')->send(new SendNotificationMail($changes));
    echo "Correo enviado con éxito.";
} else {
    echo "No hay cambios para enviar.";
}
