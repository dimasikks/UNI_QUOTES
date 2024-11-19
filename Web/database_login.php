<?php
$host = "database";
$db = "uni_quote";
$user = "postgres";
$pass = "postgres321";
$port = "5432";

$options = [
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db",$user,$pass,$options);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $username = $_POST['username_login'];
        $password = $_POST['password_login'];
    
        $stmt = $pdo->prepare("SELECT pass FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result && $password === $result['pass']) {
            echo "<div class=\"authorization_answer\">Успех! Переход через 3..2..1</div>";
            echo "<script>
                setTimeout(function() {
                window.location.href = 'main.php';
                }, 3000);
            </script>";
        } else {
            echo "<script>alert(\"Неверный логин или пароль.\");</script>";
        }
    }
}
catch (PDOException $e) {
    echo 'Ошибка подключения: ' . $e->getMessage();
}


?>
