
  <!doctype html>
  <html lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>THIẾT BỊ DẠY HỌC SỐ  - Tin học 7 | Bài 4: Quản lí dữ liệu trong máy tính</title>
    <style>
      <?php include("styles.css"); ?>
    </style>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="brand">
          <div class="logo">
        <img style="height:40px;weight: 40px" src="images/logo.png" alt="Logo">
          </div>
          <div>
            <div style="font-weight:800">THIẾT BỊ DẠY HỌC SỐ - Tin học 7</div>
            <div style="font-size:13px;opacity:0.9">Bài 4: Quản lí dữ liệu trong máy tính</div>
          </div>
        </div>
        <nav id="mainNav" style="margin-top:12px">
  <a href="#" class="active" onclick="navigate('home')">Trang chủ</a>
  <a href="#" onclick="navigate('lesson')">Bài học</a>
  <a href="#" onclick="navigate('simulation')">Mô phỏng</a>
  <a href="#" onclick="navigate('quiz')">Trắc nghiệm</a>
  <a href="#" onclick="navigate('results')">Kết quả</a>
  <a href="#" onclick="navigate('about')">Giới thiệu</a>
</nav>

      </div>
    </header>

    <main class="container">
      <section id="home" class="hero" data-view>
        <h1>Trang web mô phỏng: Hệ điều hành máy tính</h1>
        <p class="lead">Mục tiêu: Giúp học sinh hiểu khái niệm và vai trò của hệ điều hành; thực hành thao tác cơ bản và làm bài trắc nghiệm ôn tập.</p>
        <div style="display:flex;gap:8px;margin-top:12px">
          <button class="btn" onclick="navigate('lesson')">Bắt đầu học</button>
          <button class="btn secondary" onclick="navigate('simulation')">Thử mô phỏng</button>
        </div>
      </section>

      <div class="grid">
        <div>
          <?php include("Bai_Hoc.php"); ?>
          <?php include("Mo_Phong.php"); ?>
          <?php include("Trac_Nghiem.php"); ?>
          <?php include("Gioi_Thieu.php"); ?>
          <?php include("KetQua.php"); ?>
        </div>

        <aside>
          <div class="card">
            <h3>Thông tin nhanh</h3>
            <p><strong>Môn:</strong> Tin học 7</p>
            <p><strong>Bài:</strong> Hệ điều hành</p>
            <p><strong>Gồm:</strong> Bài học, mô phỏng, trắc nghiệm</p>
            <hr/>
            <p style="font-size:14px;color:var(--muted)">Mẹo: Mở "Mô phỏng" và thử các nút. Điểm trắc nghiệm được lưu tạm bằng trình duyệt.</p>
          </div>
        </aside>
      </div>
    </main>

    <footer>
      © 2025 Trường THCS Nguyễn Văn Linh — Thiết bị dạy học số (Mẫu)
    </footer>

    
    <script src="/demo.js"></script>
    <script>
function navigate(view) {
  // Ẩn tất cả các phần
  document.querySelectorAll('[data-view]').forEach(v => v.style.display = 'none');
  
  // Hiện phần tương ứng
  const section = document.querySelector(`#${view}`);
  if (section) section.style.display = 'block';

  // Đổi trạng thái nav active
  document.querySelectorAll('#mainNav a').forEach(a => a.classList.remove('active'));
  const activeLink = document.querySelector(`#mainNav a[onclick*="${view}"]`);
  if (activeLink) activeLink.classList.add('active');
}
</script>

  </body>
  </html>
  <?php include("./chat.php") ?>