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
    [$quote_of_the_day, $author_of_quote] = get_random_quote($pdo);

    $stmt = $pdo->query("SELECT image_path FROM author_image WHERE author='$author_of_quote'");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $image_path = $result['image_path'];
}
catch (PDOException $e) {
    echo 'Ошибка подключения: ' . $e->getMessage();
}

function get_random_quote($pdo) {
    $tables = [
        'quote_motivation',
        'quote_life',
        'quote_love',
        'quote_goal',
        'quote_mean_life'
    ];
        
    $random_table = $tables[array_rand($tables)];

    $stmt = $pdo->query("SELECT quote, author FROM $random_table ORDER BY RANDOM() LIMIT 1");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return [$result['quote'], $result['author']];
}

#$pdo=null;
?>
