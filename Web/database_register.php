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
        $username = $_POST['username_register'];
        $email = $_POST['email_register'];
        $password = $_POST['password_register'];
        $password_confirmation = $_POST['password_register_confirmed'];
    
        if ($password !== $password_confirmation) {
            echo "<script>alert(\"Пароли не совпадают!\");</script>";
        } else {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                echo "<script>alert(\"Данная почта уже зарегистрирована на сайте!\");</script>";
            } else {
                $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
                $stmt->bindParam(':username', $username);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    echo "<script>alert(\"Выбранное имя пользователя уже занято, выберите другое!\");</script>";
                }
                else {
                    //$hashed_password = password_hash($password, PASSWORD_BCRYPT);
                    $stmt = $pdo->prepare("INSERT INTO users (username, email, pass) VALUES (:username, :email, :pass)");
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':pass', $password);
                    
                    if ($stmt->execute()) {
                        echo "<div class=\"registration_answer\">Успех! Переход через 3..2..1</div>";
                        echo "<script>
                            setTimeout(function() {
                            window.location.href = 'main.php';
                            }, 3000);
                            </script>";
                    } else {
                        echo "<div class=\"registration_answer\">Ошибка при регистрации пользователя.</div>";
                    }
                }
            }
        }
    }
}
catch (PDOException $e) {
    echo 'Ошибка подключения: ' . $e->getMessage();
}


?>
