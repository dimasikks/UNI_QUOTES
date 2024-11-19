<!DOCTYPE html>
<html>
<head>
	<title>main.localhost</title>
	<link rel="stylesheet" type="text/css" href="CSS/style_main_page.css">
    <meta charset="utf-8">   
<!--<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">-->
</head>
<body>
    <div class="navbar">
        <div class="show">quotes.for_you.localhost</div>
    </div>
    <div class="daily_quote">
        <h2>Случайная цитата, которая, возможно, что-то значит:</h2>
        <div class="quote_of_day">
            <?php  
            include('database_main.php');
            echo "\"$quote_of_the_day\"";
            ?>
        </div>
    </div>
    <div class="author_of_quote_photo">
        <?php
        echo "<img src=\"$image_path\" width=\"150\" height=\"100\">";
        ?>
    </div>
    <div class="author_of_quote">
        <?php
        echo "$author_of_quote";
        ?>
    </div>
    <div class="main">
        <h2>Выберите категорию цитат:</h2>
    <form method="POST">
        <select name="category">
            <option value="quote_motivation">Мотивационные цитаты</option>
            <option value="quote_life">Цитаты о жизни</option>
            <option value="quote_love">Цитаты о любви</option>
            <option value="quote_goal">Цитаты о достижении цели</option>
            <option value="quote_mean_life">Цитаты о смысле жизни</option>
        </select>
        <button type="submit">Показать цитаты</button>
    </form>
    </div>
    <div class="border_main">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category'])) {
      $category = $_POST["category"];
      $query = "SELECT author, quote FROM $category ORDER BY RANDOM() LIMIT 5";

      $stmt = $pdo->query($query);
      $quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($quotes as $quote) {
        echo "<p class=\"quote_main\">\"{$quote['quote']}\"</p>";
        echo "<p class=\"author_main\">{$quote['author']}</p>";
      }
    } 
    ?>
    </div>
</div>
<div class="sign">
    made by dimasikks
</div>
</body>
</html>
