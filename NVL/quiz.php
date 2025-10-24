    <?php include 'db.php'; ?>

    <!DOCTYPE html>
    <html lang="vi">
    <head>
    <meta charset="UTF-8">
    <title>Làm bài trắc nghiệm</title>
    </head>
    <body>
    <h2>Bài trắc nghiệm</h2>
    <form method="post">
    <?php
    $result = $conn->query("SELECT * FROM questions");
    $index = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<p><b>{$index}. {$row['question']}</b></p>";
    foreach (['A', 'B', 'C', 'D'] as $opt) {
        if (!empty($row[$opt])) {
            echo "<label><input type='radio' name='q{$row['id']}' value='{$opt}'> {$row[$opt]}</label><br>";
        }
    }

        $index++;
    }
    ?>
    <br>
    <button type="submit" name="submit">Nộp bài</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        echo "<h3>Kết quả:</h3>";
        $score = 0;
        $total = 0;

        $res = $conn->query("SELECT id, correct FROM questions WHERE correct IS NOT NULL");
        while ($row = $res->fetch_assoc()) {
            $qid = $row['id'];
            $ans = $_POST["q$qid"] ?? '';
            if ($ans == $row['correct']) $score++;
            $total++;
        }
        echo "<p>Bạn đúng $score / $total câu</p>";
    }
    ?>
    </body>
    </html>