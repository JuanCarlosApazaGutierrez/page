<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email) {  
        $filePath = 'emails.txt';
        file_put_contents($filePath, $email . PHP_EOL, FILE_APPEND);
        echo "¡Gracias! Tu correo ($email) ha sido registrado correctamente.";
    } else {
        echo "Por favor, ingresa un correo electrónico válido.";
    }
} else {
 
    echo "Por favor, envía el formulario.";
}
?>
