<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = htmlspecialchars(trim($_POST['first_name'] ?? ''));
    $last_name = htmlspecialchars(trim($_POST['last_name'] ?? ''));
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $comments = htmlspecialchars(trim($_POST['comments'] ?? ''));
    if ($first_name && $last_name && $email && $comments) {
        $filePath = 'mensajes.txt';
        $message = "Nombre: $first_name $last_name\n";
        $message .= "Correo: $email\n";
        $message .= "Teléfono: $phone\n";
        $message .= "Mensaje:\n$comments\n";
        $message .= "-------------------------\n";
        file_put_contents($filePath, $message, FILE_APPEND);
        echo "¡Gracias, $first_name! Tu mensaje ha sido enviado correctamente.";
    } else {
        echo "Por favor, completa todos los campos obligatorios (Nombre, Apellido, Correo y Mensaje).";
    }
} else {
    echo "Por favor, envía el formulario.";
}
?>
