<?php
include 'db.php';

$name = $_POST['studentName'] ?? '';
$class = $_POST['className'] ?? '';
$time = $_POST['time'] ?? '';

if (!$name || !$class) {
    echo "Thiếu thông tin học sinh.";
    exit;
}

$score = 0;
$total = 0;

$result = $conn->query("SELECT * FROM questions");

echo "<h3>Kết quả làm bài</h3>";
echo "<p><b>Họ và tên:</b> $name &nbsp;&nbsp; <b>Lớp:</b> $class &nbsp;&nbsp; <b>Thời gian:</b> $time</p>";
echo "<hr>";

while ($row = $result->fetch_assoc()) {
    $qid = $row['id'];
    $userAns = $_POST["q$qid"] ?? '';
    $correct = $row['correct'];
    $total++;

    echo "<p><b>Câu $total:</b> {$row['question']}<br>";

    foreach (['A','B','C','D'] as $opt) {
        if (!empty($row[$opt])) {
            $color = '';
            $mark = '';
            if ($userAns == $opt && $userAns == $correct) {
                $color = 'green';
                $mark = '✅';
            } elseif ($userAns == $opt && $userAns != $correct) {
                $color = 'red';
                $mark = '❌';
            } elseif ($opt == $correct) {
                $color = 'green';
                $mark = '(Đúng)';
            }

            echo "<span style='color:$color'>$mark {$opt}. {$row[$opt]}</span><br>";
        }
    }

    if ($userAns == $correct) {
        $score++;
    }

    echo "</p><hr>";
}

echo "<h3>🎯 Tổng điểm: $score / $total</h3>";

// Lưu kết quả vào CSDL
$stmt = $conn->prepare("INSERT INTO results (student_name, class_name, score, total, time_spent) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiis", $name, $class, $score, $total, $time);
$stmt->execute();
$stmt->close();
$conn->close();
?>
