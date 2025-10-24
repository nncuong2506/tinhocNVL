<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Thêm câu hỏi trắc nghiệm</title>
<style>
body { font-family: Arial; margin: 40px; }
textarea { width: 100%; height: 300px; font-size: 14px; white-space: pre; }
button { background: #007bff; color: white; padding: 8px 14px; border: none; border-radius: 5px; cursor: pointer; }
button:hover { background: #0056b3; }
</style>
</head>
<body>
<h2>Nhập câu hỏi trắc nghiệm (A–D + đáp án)</h2>
<p>Nhập theo mẫu sau:</p>
<pre>
Câu 1. Thiết bị nào sau đây là thiết bị vào?
A. Màn hình
B. Bàn phím
C. Loa
D. Máy in
Đáp án: B
</pre>

<form method="post">
<textarea name="content" placeholder="Dán câu hỏi ở đây..."></textarea><br><br>
<button type="submit">Lưu vào CSDL</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = trim($_POST["content"]);
    // Tách các khối câu hỏi bằng "Câu"
    $blocks = preg_split('/\n\s*Câu\s*/u', $text);
    $count = 0;

    foreach ($blocks as $b) {
        $b = trim($b);
        if ($b == '') continue;

        // Thêm lại chữ "Câu" nếu bị mất
        if (!str_starts_with($b, 'Câu')) $b = 'Câu ' . $b;

        // Lấy các dòng riêng biệt
        $lines = preg_split('/\r\n|\r|\n/', $b);
        $q = '';
        $a = $b1 = $c = $d = $ans = '';

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line == '') continue;

            if (preg_match('/^Câu/i', $line)) $q = preg_replace('/^Câu\s*\d*\.\s*/i', '', $line);
            elseif (preg_match('/^A\./i', $line)) $a = trim(substr($line, 2));
            elseif (preg_match('/^B\./i', $line)) $b1 = trim(substr($line, 2));
            elseif (preg_match('/^C\./i', $line)) $c = trim(substr($line, 2));
            elseif (preg_match('/^D\./i', $line)) $d = trim(substr($line, 2));
            elseif (preg_match('/Đáp án\s*:?\s*([A-D])/iu', $line, $m)) $ans = strtoupper($m[1]);
        }

        if ($q != '' && $a != '' && $b1 != '' && $c != '' && $d != '' && $ans != '') {
            $sql = "INSERT INTO questions (question, A, B, C, D, correct)
                    VALUES ('" . $conn->real_escape_string($q) . "',
                            '" . $conn->real_escape_string($a) . "',
                            '" . $conn->real_escape_string($b1) . "',
                            '" . $conn->real_escape_string($c) . "',
                            '" . $conn->real_escape_string($d) . "',
                            '" . $conn->real_escape_string($ans) . "')";
            if ($conn->query($sql)) $count++;
        }
    }

    echo "<p style='color:green;font-weight:bold'>✅ Đã thêm $count câu hỏi vào CSDL!</p>";
}
?>
</body>
</html>
