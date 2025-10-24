      // Điều hướng giữa các phần
      const views = document.querySelectorAll('[data-view]');
      function navigate(route){
        views.forEach(v=>v.style.display='none');
        document.getElementById(route).style.display='block';
        document.querySelectorAll('nav a').forEach(a=>a.classList.remove('active'));
        const link = document.querySelector('nav a[data-route="'+route+'"]');
        if(link) link.classList.add('active');
        window.scrollTo({top:0,behavior:'smooth'});
      }
    
      document.querySelectorAll('nav a').forEach(a=>{
        a.addEventListener('click',(e)=>{
          e.preventDefault();
          navigate(a.getAttribute('data-route'));
        });
      });

      // Mô phỏng
      const powerBtn=document.getElementById('powerBtn'),
            openBtn=document.getElementById('openBtn'),
            closeBtn=document.getElementById('closeBtn'),
            bootNotice=document.getElementById('bootNotice'),
            desktop=document.getElementById('desktop'),
            fileWindow=document.getElementById('fileWindow');
      let powered=false;
      powerBtn?.addEventListener('click',()=>{
        if(!powered){
          powered=true;
          bootNotice.style.display='none';
          desktop.style.display='block';
          powerBtn.textContent='Tắt máy';
        }else{
          powered=false;
          bootNotice.style.display='block';
          desktop.style.display='none';
          fileWindow.style.display='none';
          powerBtn.textContent='Bật máy';
        }
      });
      openBtn?.addEventListener('click',()=>{
        if(!powered){ alert('Vui lòng bật máy trước khi mở tệp.'); return;}
        fileWindow.style.display='block';
      });
      closeBtn?.addEventListener('click',()=>fileWindow.style.display='none');

      // Trắc nghiệm
      const answers={q1:'B',q2:'D',q3:'C',q4:'D',q5:'A'};
      function submitQuiz(){
        const name=document.getElementById('studentName').value.trim()||'Học sinh';
        let score=0,total=Object.keys(answers).length;
        for(const q in answers){
          const els=document.getElementsByName(q);
          let selected=null;
          for(const e of els){ if(e.checked) selected=e.value; }
          if(selected===answers[q]) score++;
        }
        const percent=Math.round(score/total*100);
        const box=document.getElementById('quizResult');
        box.style.display='block';
        box.innerHTML=`<strong>${name}</strong> đạt <strong>${score}/${total}</strong> (${percent}%).`+(percent>=80?' Tuyệt vời!':' Cần ôn thêm.');
        document.getElementById('scoreBox').textContent='Điểm: '+score+'/'+total;
        const record={name,score,total,date:new Date().toLocaleString()};
        let records=JSON.parse(localStorage.getItem('tinhoc7_quiz'))||[];
        records.push(record);
        localStorage.setItem('tinhoc7_quiz',JSON.stringify(records));
      }
      function resetQuiz(){
        document.getElementById('quizForm').reset();
        document.getElementById('quizResult').style.display='none';
        document.getElementById('scoreBox').textContent='';
      }
      document.getElementById('studentName').value=localStorage.getItem('tinhoc7_name')||'';
      document.getElementById('studentName').addEventListener('change',(e)=>{
        localStorage.setItem('tinhoc7_name',e.target.value);
      });
      window.addEventListener('hashchange',()=>{
        const hash=location.hash.replace('#','');
        if(hash) navigate(hash);
      });
  

    
  document.addEventListener("DOMContentLoaded", function() {
    const powerBtn = document.getElementById("powerBtn");
    if (!powerBtn) return; // tránh lỗi khi chưa load section

    const desktop = document.getElementById("desktop");
    const screenOff = document.getElementById("screenOff");
    const buttons = document.querySelectorAll(".controls button:not(#powerBtn)");

    let folders = [];
    let files = [];
    let powerOn = false;
    let selectedFolder = null;
    let selectedFile = null;

    powerBtn.onclick = () => {
      powerOn = !powerOn;
      if (powerOn) {
        screenOff.style.display = "none";
        powerBtn.textContent = "Tắt máy";
        buttons.forEach(b => b.disabled = false);
      } else {
        screenOff.style.display = "flex";
        powerBtn.textContent = "Bật máy";
        buttons.forEach(b => b.disabled = true);
        desktop.innerHTML = "";
        folders = [];
        files = [];
      }
    };

    document.getElementById("createFolderBtn").onclick = () => {
      const name = prompt("Nhập tên thư mục:");
      if (!name) return;
      const folder = document.createElement("div");
      folder.className = "folder";
      folder.textContent = name;
      folder.onclick = () => selectFolder(folder);
      desktop.appendChild(folder);
      folders.push(folder);
    };

    document.getElementById("copyFolderBtn").onclick = () => {
      if (!selectedFolder) return alert("Chọn thư mục trước!");
      const clone = selectedFolder.cloneNode(true);
      clone.onclick = () => selectFolder(clone);
      clone.textContent += "_copy";
      desktop.appendChild(clone);
      folders.push(clone);
    };

    document.getElementById("deleteFolderBtn").onclick = () => {
      if (!selectedFolder) return alert("Chọn thư mục trước!");
      desktop.removeChild(selectedFolder);
      folders = folders.filter(f => f !== selectedFolder);
      selectedFolder = null;
    };

    document.getElementById("createFileBtn").onclick = () => {
      const name = prompt("Nhập tên tệp:");
      if (!name) return;
      const ext = prompt("Nhập phần mở rộng (ví dụ: .txt, .docx, .jpg):");
      if (!ext) return;
      const file = document.createElement("div");
      file.className = "file";
      file.textContent = name + ext;
      file.onclick = () => selectFile(file);
      desktop.appendChild(file);
      files.push(file);
    };

    document.getElementById("deleteFileBtn").onclick = () => {
      if (!selectedFile) return alert("Chọn tệp trước!");
      desktop.removeChild(selectedFile);
      files = files.filter(f => f !== selectedFile);
      selectedFile = null;
    };

    function selectFolder(folder) {
      folders.forEach(f => f.style.border = "none");
      folder.style.border = "2px solid yellow";
      selectedFolder = folder;
      selectedFile = null;
    }

    function selectFile(file) {
      files.forEach(f => f.style.border = "none");
      file.style.border = "2px solid lime";
      selectedFile = file;
      selectedFolder = null;
    }
  });
  



  document.addEventListener("DOMContentLoaded", function() {
    const powerBtn = document.getElementById("powerBtn");
    if (!powerBtn) return; // tránh lỗi khi chưa load section

    const desktop = document.getElementById("desktop");
    const screenOff = document.getElementById("screenOff");
    const buttons = document.querySelectorAll(".controls button:not(#powerBtn)");

    let folders = [];
    let files = [];
    let powerOn = false;
    let selectedFolder = null;
    let selectedFile = null;

    powerBtn.onclick = () => {
      powerOn = !powerOn;
      if (powerOn) {
        screenOff.style.display = "none";
        powerBtn.textContent = "Tắt máy";
        buttons.forEach(b => b.disabled = false);
      } else {
        screenOff.style.display = "flex";
        powerBtn.textContent = "Bật máy";
        buttons.forEach(b => b.disabled = true);
        desktop.innerHTML = "";
        folders = [];
        files = [];
      }
    };

    document.getElementById("createFolderBtn").onclick = () => {
      const name = prompt("Nhập tên thư mục:");
      if (!name) return;
      const folder = document.createElement("div");
      folder.className = "folder";
      folder.textContent = name;
      folder.onclick = () => selectFolder(folder);
      desktop.appendChild(folder);
      folders.push(folder);
    };

    document.getElementById("copyFolderBtn").onclick = () => {
      if (!selectedFolder) return alert("Chọn thư mục trước!");
      const clone = selectedFolder.cloneNode(true);
      clone.onclick = () => selectFolder(clone);
      clone.textContent += "_copy";
      desktop.appendChild(clone);
      folders.push(clone);
    };

    document.getElementById("deleteFolderBtn").onclick = () => {
      if (!selectedFolder) return alert("Chọn thư mục trước!");
      desktop.removeChild(selectedFolder);
      folders = folders.filter(f => f !== selectedFolder);
      selectedFolder = null;
    };

    document.getElementById("createFileBtn").onclick = () => {
      const name = prompt("Nhập tên tệp:");
      if (!name) return;
      const ext = prompt("Nhập phần mở rộng (ví dụ: .txt, .docx, .jpg):");
      if (!ext) return;
      const file = document.createElement("div");
      file.className = "file";
      file.textContent = name + ext;
      file.onclick = () => selectFile(file);
      desktop.appendChild(file);
      files.push(file);
    };

    document.getElementById("deleteFileBtn").onclick = () => {
      if (!selectedFile) return alert("Chọn tệp trước!");
      desktop.removeChild(selectedFile);
      files = files.filter(f => f !== selectedFile);
      selectedFile = null;
    };

    function selectFolder(folder) {
      folders.forEach(f => f.style.border = "none");
      folder.style.border = "2px solid yellow";
      selectedFolder = folder;
      selectedFile = null;
    }

    function selectFile(file) {
      files.forEach(f => f.style.border = "none");
      file.style.border = "2px solid lime";
      selectedFile = file;
      selectedFolder = null;
    }
  });
 