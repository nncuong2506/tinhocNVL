<section id="results" class="card" data-view style="display:none">
<?php include 'db.php'; ?>

<h2>Kết quả làm bài trắc nghiệm</h2>

<!-- Ô tìm kiếm -->
<div style="margin-bottom:15px;text-align:center">
  <input type="text" id="searchInput" placeholder="Nhập tên hoặc lớp..." style="padding:6px;width:220px">
  <button id="btnSearch" style="padding:6px 12px">Tìm kiếm</button>
  <button id="btnReset" style="padding:6px 12px">Làm mới</button>
</div>

<div id="resultTable"></div>

<script>
function loadResults(keyword = "") {
  fetch("ketqua_load.php?search=" + encodeURIComponent(keyword))
    .then(r => r.text())
    .then(html => document.getElementById("resultTable").innerHTML = html)
    .catch(err => console.error("Lỗi:", err));
}

document.getElementById("btnSearch").addEventListener("click", () => {
  const keyword = document.getElementById("searchInput").value.trim();
  loadResults(keyword);
});

document.getElementById("btnReset").addEventListener("click", () => {
  document.getElementById("searchInput").value = "";
  loadResults();
});

// Tải danh sách ban đầu
loadResults();
</script>
</section>
