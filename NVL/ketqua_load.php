<?php
include 'db.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sql = "SELECT * FROM results";
if ($search !== '') {
    $sql .= " WHERE student_name LIKE '%$search%' OR class_name LIKE '%$search%'";
}
$sql .= " ORDER BY created_at DESC";
$res = $conn->query($sql);

if ($res->num_rows > 0) {
    echo "<table border='1' cellpadding='6' cellspacing='0' style='border-collapse:collapse;width:100%;text-align:center'>";
    echo "<tr style='background:#f2f2f2;font-weight:bold'>
            <td>STT</td>
            <td>Họ và tên</td>
            <td>Lớp</td>
            <td>Điểm</td>
            <td>Thời gian làm</td>
            <td>Ngày giờ nộp</td>
          </tr>";
    $stt = 1;
    while ($row = $res->fetch_assoc()) {
        echo "<tr>
                <td>{$stt}</td>
                <td>".htmlspecialchars($row['student_name'])."</td>
                <td>".htmlspecialchars($row['class_name'])."</td>
                <td><b>{$row['score']}/{$row['total']}</b></td>
                <td>{$row['time_spent']}</td>
                <td>{$row['created_at']}</td>
              </tr>";
        $stt++;
    }
    echo "</table>";
} else {
    echo "<p style='text-align:center'>Không tìm thấy kết quả nào phù hợp.</p>";
}
?>
