<section id="quiz" class="card" data-view style="display:none">
  <h2>Làm bài trắc nghiệm</h2>

  <div id="infoForm">
    <label>Họ và tên:</label><br>
    <input type="text" id="studentName" required><br><br>
    <label>Lớp:</label><br>
    <select id="className" required>
      <option value="">-- Chọn lớp --</option>
      <option value="7/1">7/1</option>
      <option value="7/2">7/2</option>
      <option value="7/3">7/3</option>
      <option value="7/4">7/4</option>
      <option value="7/5">7/5</option>
      <option value="7/5">7/6</option>
      <option value="7/5">7/7</option>
      <option value="7/5">7/8</option>
      <option value="7/5">7/9</option>
      <option value="7/5">7/10</option>
      <option value="7/5">7/11</option>
      <option value="7/5">7/12</option>
      <option value="7/5">7/13</option>
    </select><br><br>
   
    <button id="btnStart">Bắt đầu làm bài</button>
  </div>

  <div id="quizArea" style="display:none">
    <div style="display:flex;justify-content:space-between;align-items:center">
      <strong id="studentInfo"></strong>
      <div>⏰ Thời gian: <span id="timer">00:00</span></div>
    </div>
    <hr>

    <form id="quizForm">
      <?php
      include 'db.php';
      $result = $conn->query("SELECT * FROM questions");
      $index = 1;
      while ($row = $result->fetch_assoc()) {
          echo "<p><b>Câu {$index}. {$row['question']}</b></p>";
          foreach (['A', 'B', 'C', 'D'] as $opt) {
              if (!empty($row[$opt])) {
                  echo '<label><input type="radio" name="q' . $row['id'] . '" value="' . $opt . '"> ' . htmlspecialchars($row[$opt]) . '</label><br>';
              }
          }
          echo "<br>";
          $index++;
      }
      ?>
      <button type="button" id="btnSubmit">Nộp bài</button>
      <button id="btnRetry" style="display:none;margin-top:10px;">Làm lại bài</button>
    </form>

    <div id="quizResult" style="margin-top:20px;font-weight:bold;"></div>
    

  </div>

  <script>
  let startTime, timerInterval;

  // Bắt đầu làm bài
  document.getElementById("btnStart").addEventListener("click", () => {
    const name = document.getElementById("studentName").value.trim();
    const cls = document.getElementById("className").value.trim();
    if (!name || !cls) return alert("Vui lòng nhập đầy đủ họ tên và lớp.");

    document.getElementById("infoForm").style.display = "none";
    document.getElementById("quizArea").style.display = "block";
    document.getElementById("studentInfo").textContent = name + " - " + cls;

    startTime = new Date();
    let sec = 0;
    timerInterval = setInterval(() => {
      sec++;
      const m = String(Math.floor(sec / 60)).padStart(2, '0');
      const s = String(sec % 60).padStart(2, '0');
      document.getElementById("timer").textContent = `${m}:${s}`;
    }, 1000);
  });

  // Nộp bài
  document.getElementById("btnSubmit").addEventListener("click", () => {
    clearInterval(timerInterval);
    const name = document.getElementById("studentName").value.trim();
    const cls = document.getElementById("className").value.trim();

    const form = document.getElementById("quizForm");
    const formData = new FormData(form);
    formData.append("studentName", name);
    formData.append("className", cls);
    formData.append("time", document.getElementById("timer").textContent);

    fetch("check.php", {
      method: "POST",
      body: formData
    })
    .then(r => r.text())
    .then(html => {
      document.getElementById("quizResult").innerHTML = html;
      document.getElementById("btnSubmit").disabled = true;
    })
    .catch(err => alert("Lỗi: " + err));
  });
  // Nút làm lại bài
document.getElementById("btnRetry").addEventListener("click", () => {
  document.getElementById("quizForm").reset();       // Bỏ chọn tất cả đáp án
  document.getElementById("quizResult").innerHTML = ""; // Xóa kết quả
  document.getElementById("btnSubmit").disabled = false; // Cho phép nộp lại
  document.getElementById("btnRetry").style.display = "none"; // Ẩn nút
  document.getElementById("timer").textContent = "00:00"; // Reset thời gian
  document.getElementById("quizArea").style.display = "none"; // Ẩn khu làm bài
  document.getElementById("infoForm").style.display = "block"; // Hiện form nhập tên/lớp
});

  </script>
</section>
