<section id="simulation" class="card" data-view>

  <h2>Mô phỏng hệ điều hành</h2>
  <p>Thực hành bật máy, tạo thư mục, tệp và thao tác cơ bản.</p>

  <div class="controls">
    <button id="powerBtn">Bật máy</button>
    <button id="createFolderBtn" disabled>Tạo thư mục</button>
    <button id="copyFolderBtn" disabled>Sao chép thư mục</button>
    <button id="deleteFolderBtn" disabled>Xóa thư mục</button>
    <button id="createFileBtn" disabled>Tạo tệp</button>
    <button id="deleteFileBtn" disabled>Xóa tệp</button>
  </div>

  <div id="computerScreen">
    <div id="screenOff">MÁY TÍNH ĐANG TẮT</div>
    <div id="desktop" style="display:none"></div>
  </div>

  <style>
        <?php include("styles1.css"); ?>
  </style>

  <script>
  function initSimulation() {
    const powerBtn = document.getElementById("powerBtn");
    const desktop = document.getElementById("desktop");
    const screenOff = document.getElementById("screenOff");
    const buttons = document.querySelectorAll(".controls button:not(#powerBtn)");

    if (!powerBtn || !desktop) return;

    let folders = [];
    let files = [];
    let powerOn = false;
    let selectedFolder = null;
    let selectedFile = null;

    buttons.forEach(b => b.disabled = true);
    screenOff.style.display = "flex";
    desktop.style.display = "none";

    // bật/tắt máy
    powerBtn.onclick = () => {
      powerOn = !powerOn;
      if (powerOn) {
        screenOff.style.display = "none";
        desktop.style.display = "flex";
        powerBtn.textContent = "Tắt máy";
        buttons.forEach(b => b.disabled = false);
      } else {
        screenOff.style.display = "flex";
        desktop.style.display = "none";
        powerBtn.textContent = "Bật máy";
        buttons.forEach(b => b.disabled = true);
        desktop.innerHTML = "";
        folders = [];
        files = [];
        selectedFolder = null;
        selectedFile = null;
      }
    };

    // tạo thư mục
    document.getElementById("createFolderBtn").onclick = () => {
      const name = prompt("Nhập tên thư mục:");
      if (!name) return;
      const folder = document.createElement("div");
      folder.className = "folder";
      folder.innerHTML = `
        <img src="https://cdn-icons-png.flaticon.com/512/716/716784.png" alt="folder">
        <div>${name}</div>`;
      folder.onclick = () => selectFolder(folder);
      desktop.appendChild(folder);
      folders.push(folder);
    };

    // sao chép thư mục
    document.getElementById("copyFolderBtn").onclick = () => {
      if (!selectedFolder) return alert("Chọn thư mục trước!");
      const clone = selectedFolder.cloneNode(true);
      clone.onclick = () => selectFolder(clone);
      clone.querySelector("div").textContent += "_copy";
      desktop.appendChild(clone);
      folders.push(clone);
    };

    // xóa thư mục
    document.getElementById("deleteFolderBtn").onclick = () => {
      if (!selectedFolder) return alert("Chọn thư mục trước!");
      desktop.removeChild(selectedFolder);
      folders = folders.filter(f => f !== selectedFolder);
      selectedFolder = null;
    };

    // tạo tệp
    document.getElementById("createFileBtn").onclick = () => {
      const name = prompt("Nhập tên tệp:");
      if (!name) return;
      const ext = prompt("Nhập phần mở rộng (ví dụ: .txt, .docx, .jpg):");
      if (!ext.match(/^\.\w+$/)) {
        alert("Vui lòng nhập đúng phần mở rộng (bắt đầu bằng dấu chấm, ví dụ: .txt)");
        return;
      }
      const file = document.createElement("div");
      file.className = "file";
      file.innerHTML = `
        <img src="https://cdn-icons-png.flaticon.com/512/337/337946.png" alt="file">
        <div>${name}${ext}</div>`;
      file.onclick = () => selectFile(file);
      desktop.appendChild(file);
      files.push(file);
    };

    // xóa tệp
    document.getElementById("deleteFileBtn").onclick = () => {
      if (!selectedFile) return alert("Chọn tệp trước!");
      desktop.removeChild(selectedFile);
      files = files.filter(f => f !== selectedFile);
      selectedFile = null;
    };

    // chọn thư mục
    function selectFolder(folder) {
      folders.forEach(f => f.style.border = "none");
      folder.style.border = "2px solid yellow";
      selectedFolder = folder;
      selectedFile = null;
    }

    // chọn tệp
    function selectFile(file) {
      files.forEach(f => f.style.border = "none");
      file.style.border = "2px solid lime";
      selectedFile = file;
      selectedFolder = null;
    }
  }

  // Gọi khi đổi tab
  window.addEventListener("hashchange", () => {
    if (location.hash.includes("simulation")) initSimulation();
  });

  // Gọi khi trang vừa tải
  window.addEventListener("DOMContentLoaded", initSimulation);
  </script>
</section>
