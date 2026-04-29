<?php
require_once "config/library.php";
require_once "config/koneksi.php";

$appurl = 'https://dasawisma.batubarakab.go.id/';
$thn_sekarang = isset($thn_sekarang) ? $thn_sekarang : date('Y');
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>e-Dasawisma | Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="icon" ; href="<?php $appurl; ?>favicon.png">
  <style>
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-image: url('./assets/images/background.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .custom-scrollbar::-webkit-scrollbar {
      width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
      background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
      background: #e2e8f0;
      border-radius: 10px;
    }

    .text-gradient {
      background: linear-gradient(135deg, #1e293b 0%, #4f46e5 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>

<body class="text-slate-900 flex items-center justify-center min-h-screen p-4 bg-black/20 backdrop-blur-[4px]">

  <div class="bg-white/90 backdrop-blur-xl w-full max-w-[1100px] 
rounded-[48px] shadow-[0_35px_100px_-15px_rgba(0,0,0,0.3)] 
border border-white/50 overflow-hidden flex flex-col md:flex-row
max-h-[90vh]">

    <div class="w-full md:w-[55%] p-6 md:p-8 flex flex-col justify-center border-r border-gray-100 overflow-y-auto">

      <div class="mb-8 text-center md:text-left flex flex-col md:flex-row items-center gap-6">
        <div class="relative">
          <div class="absolute -inset-1 bg-indigo-100 rounded-full blur-sm"></div>
          <img src="./assets/images/logo_pkk.png" alt="Logo PKK" class="relative h-20 w-auto drop-shadow-md">
        </div>
        <div class="md:pl-6 border-l-0 md:border-l-[3px] border-indigo-600/20">
          <h2 class="text-4xl font-[800] tracking-[-0.04em] leading-none text-gradient">
            e-Dasawisma
          </h2>
          <div class="flex items-center gap-2 mt-2">
            <span class="h-[2px] w-4 bg-indigo-600 rounded-full"></span>
            <p class="text-indigo-600 font-extrabold uppercase text-[11px] tracking-[0.2em]">
              Kabupaten Batu Bara
            </p>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-10 md:gap-0">
        <div class="text-center group">
          <div class="relative inline-block mb-4">
            <div class="absolute -inset-1.5 border-2 border-dashed border-indigo-200 rounded-[32px] group-hover:rotate-3 transition-transform duration-500"></div>
            <img src="./assets/images/ketua_pkk.png" alt="Foto Ketua PKK" class="relative w-40 h-48 object-cover rounded-[28px] border-4 border-white shadow-xl">
          </div>
          <h3 class="font-bold text-gray-950 text-base leading-tight">Ny. Henny Baharuddin Siagian</h3>
          <p class="text-[11px] text-indigo-700 mt-2 font-bold bg-indigo-50 inline-block px-4 py-1.5 rounded-full uppercase">Ketua TP-PKK Batu bara</p>
        </div>

        <div class="text-center group">
          <div class="relative inline-block mb-4">
            <div class="absolute -inset-1.5 border-2 border-dashed border-indigo-200 rounded-[32px] group-hover:-rotate-3 transition-transform duration-500"></div>
            <img src="./assets/images/staff_ahli_pkk.png" alt="Foto Staff Ahli" class="relative w-40 h-48 object-cover rounded-[28px] border-4 border-white shadow-xl">
          </div>
          <h3 class="font-bold text-gray-950 text-base leading-tight">Ny. Leli Syafrizal</h3>
          <p class="text-[11px] text-indigo-700 mt-2 font-bold bg-indigo-50 inline-block px-4 py-1.5 rounded-full uppercase">Staff Ahli TP-PKK Batu Bara</p>
        </div>
      </div>

      <div class="mt-6 text-center text-gray-400 text-xs font-medium italic">"Mewujudkan Keluarga Sejahtera melalui Dasawisma."</div>
    </div>

    <div class="w-full md:w-[45%] p-6 md:p-8 bg-gray-50/60 flex flex-col justify-center overflow-y-auto">
      <div class="mb-10">
        <p class="text-gray-800 mt-1 font-semibold text-sm">Silahkan Masukkan Username dan Password anda.</p>
      </div>

      <form action="cek_login.php" method="post" class="space-y-5">
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2 px-1">Username</label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 group-focus-within:text-indigo-500 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
              </svg>
            </div>
            <input type="text" name="username" placeholder="Username" required class="w-full pl-11 pr-5 py-4 bg-white border border-gray-100 rounded-2xl focus:ring-4 focus:ring-indigo-100 outline-none transition-all duration-300 text-sm shadow-sm">
          </div>
        </div>

        <div>
          <label class="text-sm font-semibold text-gray-700 block mb-2 px-1">Password</label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 group-focus-within:text-indigo-500 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
              </svg>
            </div>
            <input type="password" id="password" name="password" placeholder="••••••••" required class="w-full pl-11 pr-12 py-4 bg-white border border-gray-100 rounded-2xl focus:ring-4 focus:ring-indigo-100 outline-none transition-all duration-300 text-sm shadow-sm">
            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-400 hover:text-indigo-600">
              <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </button>
          </div>
        </div>

        <div class="relative">
          <label class="block text-sm font-semibold text-gray-700 mb-2 px-1">Pilih Tahun</label>
          <input type="hidden" name="tahun" id="selectedTahun" value="<?php echo $thn_sekarang; ?>">
          <div class="relative group">
            <button type="button" onclick="toggleDropdown()" id="dropdownBtn" class="w-full pl-11 pr-10 py-4 bg-white border border-gray-100 rounded-2xl focus:ring-4 focus:ring-indigo-100 outline-none transition-all duration-300 text-sm text-left shadow-sm font-medium flex items-center justify-between">
              <span id="displayText"><?php echo $thn_sekarang; ?></span>
              <svg class="h-4 w-4 text-gray-400 transition-transform duration-300" id="arrowIcon" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
              </svg>
            </button>
            <div class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
              </svg>
            </div>

            <div id="dropdownMenu" class="hidden absolute z-50 w-full mt-2 bg-white border border-gray-100 rounded-2xl shadow-2xl overflow-hidden">
              <div class="p-1 custom-scrollbar max-h-48 overflow-y-auto">

                <?php
                echo "<div onclick=\"selectTahun('$thn_sekarang')\" 
class=\"px-4 py-3 text-sm hover:bg-indigo-50 hover:text-indigo-700 cursor-pointer rounded-xl transition-colors font-medium\">
$thn_sekarang
</div>";

                for ($i = 2020; $i <= $thn_sekarang; $i++) {
                  echo "<div onclick=\"selectTahun('$i')\" 
    class=\"px-4 py-3 text-sm hover:bg-indigo-50 hover:text-indigo-700 cursor-pointer rounded-xl transition-colors font-medium\">
    $i
    </div>";
                }
                ?>

              </div>
            </div>
          </div>
        </div>

        <div class="flex items-center px-1"></div>

        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-2xl shadow-xl shadow-indigo-100 transition-all duration-300 transform active:scale-[0.98] mt-2">
          Masuk
        </button>
      </form>

      <div class="mt-8 text-center">
        <small>
          <span style="margin-right: 10px;">&copy;<?php echo $thn_sekarang; ?> <a
              href="https://diskominfo.batubarakab.go.id" target="blank">Dinas Komunikasi dan
              Informatika Kab. Batu Bara</a> All rights reserved.</span>
        </small>
      </div>
    </div>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }

    function toggleDropdown() {
      const menu = document.getElementById('dropdownMenu');
      const arrow = document.getElementById('arrowIcon');
      menu.classList.toggle('hidden');
      arrow.classList.toggle('rotate-180');
    }

    function selectTahun(tahun) {
      document.getElementById('selectedTahun').value = tahun;
      document.getElementById('displayText').innerText = tahun;
      toggleDropdown();
    }

    window.onclick = function(event) {
      if (!event.target.closest('#dropdownBtn')) {
        const menu = document.getElementById('dropdownMenu');
        const arrow = document.getElementById('arrowIcon');
        if (menu && !menu.classList.contains('hidden')) {
          menu.classList.add('hidden');
          arrow.classList.remove('rotate-180');
        }
      }
    }
  </script>
</body>

</html>