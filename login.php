<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Suponiendo que estas son las credenciales almacenadas
    $stored_md5_hash = 'bb0f7e021d52a4e31613d463fc0525d8'; 

    // Concatenar usuario y contraseña
    $input = $username . $password;

    // Calcular el hash MD5 de la entrada
    $input_md5 = md5($input);

    // Verificar si el hash coincide con el almacenado
    if ($input_md5 === $stored_md5_hash) {
        $_SESSION['logged_in'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = 'Credenciales inválidas';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Usuario" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <input type="submit" value="Login">
    </form>
    <p><?php echo $error; ?></p>
</body>
</html>
