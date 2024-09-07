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

    // Verifica las credenciales (puedes cambiar estos valores)
    if ($username === 'admin' && $password === 'password123') {
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
