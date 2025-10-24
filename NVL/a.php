<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Thiết bị dạy học số - Tin học 7 | Bài 3: Hệ điều hành</title>
  <style>
    :root{--accent:#0b76d1;--accent-2:#0fa3d6;--bg:#f5f9fc;--card:#ffffff;--muted:#666}
    *{box-sizing:border-box}
    body{margin:0;font-family:Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; background:var(--bg);color:#222}
    header{background:linear-gradient(90deg,var(--accent),var(--accent-2));color:#fff;padding:18px 20px;position:sticky;top:0;z-index:10}
    .container{max-width:1000px;margin:18px auto;padding:0 16px}
    .brand{display:flex;align-items:center;gap:12px}
    .logo{width:56px;height:56px;border-radius:8px;background:#fff;display:flex;align-items:center;justify-content:center;color:var(--accent);font-weight:700}
    nav{margin-top:8px}
    nav a{color:#fff;text-decoration:none;margin-right:16px;font-weight:600}
    nav a.active{text-decoration:underline}
    .hero{background:var(--card);border-radius:12px;padding:18px;margin-top:14px;box-shadow:0 6px 18px rgba(10,20,40,0.06)}
    h1{margin:6px 0 4px;font-size:20px}
    p.lead{margin:0;color:var(--muted)}
    .grid{display:grid;grid-template-columns:1fr 320px;gap:18px;margin-top:18px}
    .card{background:var(--card);padding:16px;border-radius:10px;box-shadow:0 6px 18px rgba(10,20,40,0.04)}

    /* Lesson content */
    .lesson-section{margin-bottom:12px}
    .lesson-section h3{margin:6px 0}
    ul{margin:8px 0 0 20px}

    /* Simulation */
    .sim-screen{background:#0b1220;color:#0fff;min-height:220px;border-radius:8px;padding:14px;position:relative;overflow:hidden}
    .desktop{display:flex;flex-direction:column;align-items:flex-start;gap:8px}
    .window{background:#fff;color:#111;border-radius:6px;padding:10px;width:280px;box-shadow:0 6px 18px rgba(2,6,23,0.12);display:none}
    .taskbar{position:absolute;left:0;right:0;bottom:0;height:42px;background:linear-gradient(180deg,#071021,#0b1220);display:flex;align-items:center;padding:6px 10px;gap:8px}
    .btn{background:var(--accent);color:#fff;border:none;padding:8px 12px;border-radius:6px;cursor:pointer;font-weight:600}
    .btn.secondary{background:#fff;color:var(--accent);border:1px solid rgba(0,0,0,0.06)}
    .controls{display:flex;gap:8px;margin-bottom:8px}

    /* Quiz */
    .question{margin-bottom:12px;padding:10px;border-radius:8px;border:1px solid #eee}
    .options label{display:block;margin:6px 0;cursor:pointer}
    .result{padding:10px;border-radius:8px;margin-top:8px}

    footer{padding:18px 20px;text-align:center;color:var(--muted);font-size:14px;margin-top:18px}

    @media (max-width:900px){.grid{grid-template-columns:1fr} .logo{width:48px;height:48px}}
  </style>
</head>
<body>
  <header>
    <div class="container">
      <div class="brand">
        <div class="logo">THCS<br>NVL</div>
        <div>
          <div style="font-weight:800">Thiết bị dạy học số - Tin học 7</div>
          <div style="font-size:13px;opacity:0.9">Bài 3: Hệ điều hành máy tính</div>
        </div>
      </div>
      <nav id="mainNav" style="margin-top:12px">
        <a href="#home" data-route="home" class="active">Trang chủ</a>
        <a href="#lesson" data-route="lesson">Bài học</a>
        <a href="#simulation" data-route="simulation">Mô phỏng</a>
        <a href="#quiz" data-route="quiz">Trắc nghiệm</a>
        <a href="#about" data-route="about">Giới thiệu</a>
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
        <section id="lesson" class="card" data-view style="display:none">
          <h2>Nội dung bài: Hệ điều hành</h2>
          <div class="lesson-section">
            <h3>1. Khái niệm</h3>
            <p>Hệ điều hành (Operating System - OS) là phần mềm quan trọng đóng vai trò trung gian giữa phần cứng và người dùng, giúp quản lý tài nguyên và điều khiển hoạt động của máy tính.</p>
          </div>
          <div class="lesson-section">
            <h3>2. Vai trò chính</h3>
            <ul>
              <li>Quản lý phần cứng: CPU, bộ nhớ, thiết bị vào/ra.</li>
              <li>Quản lý tệp và thư mục.</li>
              <li>Quản lý tiến trình (chạy chương trình).</li>
              <li>Giao diện người dùng (điều khiển, hiển thị).</li>
            </ul>
          </div>
          <div class="lesson-section">
            <h3>3. Ví dụ hệ điều hành phổ biến</h3>
            <p>Windows, macOS, Linux, Android. Mỗi hệ điều hành có ưu điểm và giao diện khác nhau nhưng đều giữ chức năng quản lý tài nguyên.</p>
          </div>
        </section>

        <section id="simulation" class="card" data-view style="display:none">
          <h2>Mô phỏng thao tác cơ bản</h2>
          <p>Thực hành: Bật máy → Mở tệp → Đóng tệp. (Mô phỏng đơn giản bằng JavaScript)</p>

          <div class="sim-screen" id="simScreen">
            <div id="bootNotice" style="display:block">
              <div style="font-weight:700;font-size:16px;margin-bottom:8px">Máy tính: Tắt</div>
              <div style="color:#9df9b8">Nhấn nút <strong>Bật máy</strong> để khởi động.</div>
            </div>

            <div id="desktop" style="display:none">
              <div class="desktop">
                <div style="display:flex;gap:8px;align-items:center">
                  <img src="" alt="desktop-icon" style="width:48px;height:48px;background:#fff;border-radius:8px;padding:8px;" />
                  <div style="font-weight:700">Desktop</div>
                </div>

                <div class="window" id="fileWindow">
                  <div style="font-weight:700;margin-bottom:6px">Tệp: bai1.docx</div>
                  <div>Nội dung mẫu: Hệ điều hành giúp quản lý tài nguyên.</div>
                </div>

              </div>
            </div>

            <div class="taskbar">
              <div style="display:flex;gap:8px;align-items:center">
                <button class="btn" id="powerBtn">Bật máy</button>
                <button class="btn secondary" id="openBtn">Mở tệp</button>
                <button class="btn secondary" id="closeBtn">Đóng tệp</button>
              </div>
            </div>
          </div>

          <p style="margin-top:10px;color:var(--muted)">Ghi chú: Đây là mô phỏng đơn giản để minh họa khái niệm. Giáo viên có thể mở rộng bằng hình ảnh hoặc video thực tế.</p>
        </section>

        <section id="quiz" class="card" data-view style="display:none">
          <h2>Trắc nghiệm ôn tập</h2>
          <p>Chọn đáp án đúng rồi bấm <strong>Nộp bài</strong>. Hệ thống sẽ chấm điểm ngay.</p>

          <div style="margin-top:8px">
            <label>Họ và tên: <input type="text" id="studentName" placeholder="Nhập tên học sinh" style="padding:6px;border-radius:6px;border:1px solid #ddd;width:60%"/></label>
          </div>

          <form id="quizForm" style="margin-top:12px">
            <div class="question">
              <div><strong>Câu 1.</strong> Hệ điều hành là gì?</div>
              <div class="options">
                <label><input type="radio" name="q1" value="A"> A. Thiết bị phần cứng</label>
                <label><input type="radio" name="q1" value="B"> B. Phần mềm điều khiển máy tính</label>
                <label><input type="radio" name="q1" value="C"> C. Ổ cứng</label>
                <label><input type="radio" name="q1" value="D"> D. Mạng internet</label>
              </div>
            </div>

            <div class="question">
              <div><strong>Câu 2.</strong> Vai trò nào không phải của hệ điều hành?</div>
              <div class="options">
                <label><input type="radio" name="q2" value="A"> A. Quản lý tiến trình</label>
                <label><input type="radio" name="q2" value="B"> B. Quản lý bộ nhớ</label>
                <label><input type="radio" name="q2" value="C"> C. Cung cấp giao diện người dùng</label>
                <label><input type="radio" name="q2" value="D"> D. Sửa chữa phần cứng</label>
              </div>
            </div>

            <div class="question">
              <div><strong>Câu 3.</strong> Ví dụ hệ điều hành di động là:</div>
              <div class="options">
                <label><input type="radio" name="q3" value="A"> A. Windows</label>
                <label><input type="radio" name="q3" value="B"> B. Linux</label>
                <label><input type="radio" name="q3" value="C"> C. Android</label>
                <label><input type="radio" name="q3" value="D"> D. DOS</label>
              </div>
            </div>

            <div class="question">
              <div><strong>Câu 4.</strong> Thành phần nào sau đây hệ điều hành quản lý?</div>
              <div class="options">
                <label><input type="radio" name="q4" value="A"> A. CPU</label>
                <label><input type="radio" name="q4" value="B"> B. Bộ nhớ</label>
                <label><input type="radio" name="q4" value="C"> C. Thiết bị vào/ra</label>
                <label><input type="radio" name="q4" value="D"> D. Tất cả các đáp án trên</label>
              </div>
            </div>

            <div class="question">
              <div><strong>Câu 5.</strong> Giao diện đồ họa (GUI) do hệ điều hành cung cấp giúp:</div>
              <div class="options">
                <label><input type="radio" name="q5" value="A"> A. Giao tiếp người dùng dễ dàng hơn</label>
                <label><input type="radio" name="q5" value="B"> B. Làm cho máy tính chạy nhanh hơn</label>
                <label><input type="radio" name="q5" value="C"> C. Thay đổi phần cứng</label>
                <label><input type="radio" name="q5" value="D"> D. Xóa dữ liệu tự động</label>
              </div>
            </div>

            <div style="margin-top:12px;display:flex;gap:8px;align-items:center">
              <button type="button" class="btn" onclick="submitQuiz()">Nộp bài</button>
              <button type="button" class="btn secondary" onclick="resetQuiz()">Làm lại</button>
              <div id="scoreBox" style="margin-left:auto;color:var(--muted)"></div>
            </div>

          </form>

          <div id="quizResult" class="result" style="display:none"></div>
        </section>

        <section id="about" class="card" data-view style="display:none">
          <h2>Giới thiệu</h2>
          <p><strong>Tác giả:</strong> Nguyễn Văn Cường</p>
          <p><strong>Đơn vị:</strong> Trường THCS Nguyễn Văn Linh</p>
          <p><strong>Mục tiêu:</strong> Ứng dụng CNTT trong dạy học, khuyến khích học sinh tự học và thực hành.</p>
          <p><strong>Hướng dẫn nộp sản phẩm:</strong> Tải cả thư mục hoặc chỉ file <em>index.html</em> (đã bao gồm CSS/JS) và nộp theo yêu cầu cuộc thi.</p>
        </section>
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

  <script>
    // Simple navigation between sections
    const views = document.querySelectorAll('[data-view]')
    function navigate(route){
      views.forEach(v=>v.style.display='none')
      document.getElementById(route).style.display='block'
      document.querySelectorAll('nav a').forEach(a=>a.classList.remove('active'))
      const link = document.querySelector('nav a[data-route="'+route+'"]')
      if(link) link.classList.add('active')
      // scroll to top
      window.scrollTo({top:0,behavior:'smooth'})
    }
    // init show home
    navigate('home')
    // handle nav clicks
    document.querySelectorAll('nav a').forEach(a=>{
      a.addEventListener('click', (e)=>{
        e.preventDefault();
        const r = a.getAttribute('data-route')
        navigate(r)
      })
    })

    // Simulation logic
    const powerBtn = document.getElementById('powerBtn')
    const openBtn = document.getElementById('openBtn')
    const closeBtn = document.getElementById('closeBtn')
    const bootNotice = document.getElementById('bootNotice')
    const desktop = document.getElementById('desktop')
    const fileWindow = document.getElementById('fileWindow')

    let powered = false
    powerBtn.addEventListener('click', ()=>{
      if(!powered){
        powered = true
        bootNotice.style.display='none'
        desktop.style.display='block'
        powerBtn.textContent='Tắt máy'
      } else {
        powered = false
        bootNotice.style.display='block'
        desktop.style.display='none'
        fileWindow.style.display='none'
        powerBtn.textContent='Bật máy'
      }
    })

    openBtn.addEventListener('click', ()=>{
      if(!powered){
        alert('Vui lòng bật máy trước khi mở tệp.')
        return
      }
      fileWindow.style.display='block'
    })
    closeBtn.addEventListener('click', ()=>{
      fileWindow.style.display='none'
    })

    // Quiz logic
    const answers = {q1:'B', q2:'D', q3:'C', q4:'D', q5:'A'}
    function submitQuiz(){
      const name = document.getElementById('studentName').value.trim() || 'Học sinh'
      let score=0, total=Object.keys(answers).length
      for(const q in answers){
        const els = document.getElementsByName(q)
        let selected = null
        for(const e of els){ if(e.checked) selected = e.value }
        if(selected === answers[q]) score++
      }
      const percent = Math.round(score/total*100)
      const box = document.getElementById('quizResult')
      box.style.display='block'
      box.innerHTML = <strong>${name}</strong> đạt <strong>${score}/${total}</strong> (${percent}%). + (percent>=80? ' Tuyệt vời!':' Cần ôn thêm.')
      document.getElementById('scoreBox').textContent = 'Điểm: '+score+'/'+total
      // save to localStorage as simple progress
      const record = {name,score,total,date:new Date().toLocaleString()}
      let records = JSON.parse(localStorage.getItem('tinhoc7_quiz'))||[]
      records.push(record)
      localStorage.setItem('tinhoc7_quiz', JSON.stringify(records))
    }
    function resetQuiz(){
      document.getElementById('quizForm').reset()
      document.getElementById('quizResult').style.display='none'
      document.getElementById('scoreBox').textContent = ''
    }

    // Optional: load last student name
    document.getElementById('studentName').value = localStorage.getItem('tinhoc7_name')||''
    document.getElementById('studentName').addEventListener('change', (e)=>{
      localStorage.setItem('tinhoc7_name', e.target.value)
    })

    // Show lesson when navigating directly by hash
    window.addEventListener('hashchange', ()=>{
      const hash = location.hash.replace('#','')
      if(hash) navigate(hash)
    })
  </script>
</body>
</html>