<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dashboard Belajar Online</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
  <link rel="icon" href="path/to/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap">
  <style>
      @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

    body {
      font-family: 'Open Sans', sans-serif;
    }

    header {
      background-color: orange;
      color: white;
      padding: 1rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    main {
      background-color: #f4f4f4;
      padding: 2rem;
    }
    h2 {
    color: #4a5568; /* Dark Grayish Blue */
  }

  p {
    color: #718096; /* Gray */
    line-height: 1.5;
  }

  h3 {
    color: #2d3748; /* Dark Blue-Gray */
  }

  ol,
  ul {
    color: #4a5568; /* Dark Grayish Blue */
    padding-left: 1.5rem;
    margin-bottom: 1.5rem;
  }

  pre {
    background-color: #edf2f7; /* Light Gray-Blue */
    padding: 1rem;
    border-radius: 4px;
    overflow-x: auto;
  }

  a {
    color: #4299e1; /* Blue */
    transition: color 0.3s ease-in-out;
  }

  a:hover {
    color: #2b6cb0; /* Darker Blue on Hover */
  }
    h2 {
      color: #333;
    }

    aside {
      background-color: #e0e0e0;
      padding: 1rem;
    }

    ul {
      list-style-type: none;
      padding: 0;
      display: flex;
    }

    li {
      margin-right: 0.5rem;
    }

    .hover-bg-gray-100:hover {
      background-color: #f0f0f0;
    }

    .profile-details {
      width: 78px;
      position: relative;
    }

    .profile-details img {
      height: 52px;
      width: 52px;
      object-fit: cover;
      border-radius: 20px;
      background: #fff;
    }

    .profile-details .profile_name,
    .profile-details .job {
      color: black;
      font-size: 18px;
    }

    .profile-details .job {
      font-size: 12px;
    }
    .modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
}

.modal-content {
  background-color: #fefefe;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
  /* Apply animation to the science-content */
  .science-tabs {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .science-tab {
      cursor: pointer;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      margin-right: 5px;
    }

    .science-tab:hover {
      background-color: #f0f0f0;
    }

    .science-tab.active {
      background-color: #3490dc;
      color: white;
    }

    .science-content {
      margin-top: 20px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 4px;
      animation: fadeIn 1.5s ease-in-out;
    }
  </style>
</head>

<body class="bg-gray-100 font-sans">

<header class="text-black py-4">
      <div class="container mx-auto flex justify-between items-center px-4">
        <a href="<?php echo base_url('pelajar'); ?>" class="text-xl font-bold">BelajarOnline</a>
        <ul class="flex py-4">
          <li class="px-4 py-2 hover:bg-gray-300 relative">
            <a href="#"  class=" text-black font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-blue" id="catalogDropdownToggle">Lihat Mata pelajaran</a>
            <ul class="absolute hidden text-gray-700 bg-white shadow-lg py-2 mt-1 w-100 rounded-lg"
              id="catalogDropdownMenu">
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" onclick="openModal()">Pilih Mata Pelajaran</a>
              </li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Tonton Video Pembelajaran</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Kerjakan Kuis</a></li>
            </ul>
          </li>
          <li class="px-4 py-2 hover:bg-gray-300"><a href="<?php echo base_url('pelajar/diskusi'); ?>"
               class=" text-black font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-blue">Diskusi</a></li>
          <li class="px-4 py-2 hover-bg-gray-300"><a href="#"  class=" text-black font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-blue">Laporan Kemajuan</a></li>
        </ul>
        <div class="relative">
          <div class="profile-details" id="profileDropdownToggle">
            <?php foreach ($akun as $user): ?>
              <div class="profile-content">
                <img src="<?php echo base_url('images/user/' . $user->image) ?>" alt="profileImg">
              </div>
            <?php endforeach ?>
            <div class="profile-details" id="profileDropdownToggle">
              <div class="profile-content ml-2">
                <div class="name-job">
                  <div class="job">
                    <marquee scrolldelay="200">
                     <?= $user->email ?>
                    </marquee>
                  </div>
                </div>
              </div>
              <ul class="absolute hidden text-gray-700 bg-white shadow-lg py-2 mt-1 w-35 rounded-lg right-0 top-full"
                id="profileDropdownMenu">
                <li><a href="<?php echo base_url('pelajar/profile'); ?>"
                    class="block px-4 py-2 hover:bg-gray-100">Profil</a></li>
                <li><a href="#" onclick="confirmLogout()" class="block px-4 py-2 hover:bg-gray-100">Keluar</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <main class="container mx-auto mt-8">
    <section id="sains" class="mb-8">
      <h2 class="text-2xl font-bold mb-4">Ilmu Sains</h2>

      <!-- General Science Content -->
      <div id="general-content" class="science-content">
        <p class="mb-4">
          Sains adalah metode penyelidikan dan pemahaman tentang alam semesta. Ini melibatkan pengamatan,
          eksperimen, dan pembuktian untuk menjelaskan berbagai fenomena alam dan kehidupan.
        </p>

        <h3 class="text-xl font-bold mb-2">Bagaimana Cara Meneliti Ilmu Sains?</h3>

        <ol class="list-decimal pl-8 mb-4">
          <li>Observasi: Perhatikan fenomena alam atau kejadian tertentu.</li>
          <li>Eksperimen: Lakukan eksperimen untuk mengumpulkan data.</li>
          <li>Analisis: Analisis data dan cari pola atau hubungan.</li>
          <li>Penyimpulan: Ambil kesimpulan berdasarkan data yang ditemukan.</li>
        </ol>

        <p>
          Sains membantu kita memahami dunia di sekitar kita dan memberikan jawaban terhadap
          berbagai pertanyaan tentang kehidupan, alam, dan teknologi.
        </p>
      </div>

      <!-- Biology Content -->
      <div id="biology-content" class="science-content" style="display: none;">
        <h3 class="text-xl font-bold mb-2">Biologi</h3>
        <p>
          Biologi adalah ilmu yang mempelajari kehidupan, mulai dari makhluk hidup yang paling sederhana hingga yang paling kompleks.
          <br>Contoh topik: Anatomi, Ekologi, Genetika.
        </p>
      </div>

      <!-- Physics Content -->
      <div id="physics-content" class="science-content" style="display: none;">
        <h3 class="text-xl font-bold mb-2">Fisika</h3>
        <p>
          Fisika adalah ilmu yang mempelajari sifat dasar alam semesta, termasuk materi, energi, gerak, dan kekuatan.
          <br>Contoh topik: Mekanika, Termodinamika, Optika.
        </p>
      </div>

      <!-- Chemistry Content -->
      <div id="chemistry-content" class="science-content" style="display: none;">
        <h3 class="text-xl font-bold mb-2">Kimia</h3>
        <p>
          Kimia adalah ilmu yang mempelajari sifat, struktur, komposisi, perubahan, dan energi materi.
          <br>Contoh topik: Reaksi Kimia, Struktur Atom, Tabel Periodik.
        </p>
      </div>

      <!-- Science tabs -->
      <ul class="science-tabs">
      <li class="science-tab active" data-tab="general">General</li>
<li class="science-tab" data-tab="biology">Biologi</li>
<li class="science-tab" data-tab="physics">Fisika</li>
<li class="science-tab" data-tab="chemistry">Kimia</li>
  <!-- Add more tabs for other science subjects -->
</ul>

    </section>
  </main>

  <div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h2>Pilih Mata Pelajaran</h2>
    <ul>
      <li><a href="<?php echo base_url('pelajar/matematika'); ?>">1. <br> Matematika</a></li>
      <li><a href="<?php echo base_url('pelajar/inggris'); ?>">2. <br>Bahasa Inggris</a></li>
      <li><a href="<?php echo base_url('pelajar/sains'); ?>">3. <br> Sains</a></li>
      <li><a href="<?php echo base_url('pelajar/sejarah'); ?>">4. <br> Sejarah</a></li>
      <!-- Tambahkan mata pelajaran lainnya -->
    </ul>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.science-tab');
    const contentAreas = document.querySelectorAll('.science-content');

    tabs.forEach(tab => {
      tab.addEventListener('click', function () {
        const tabName = this.getAttribute('data-tab');

        // Deactivate all tabs
        tabs.forEach(t => t.classList.remove('active'));

        // Activate the clicked tab
        this.classList.add('active');

        // Hide all content areas
        contentAreas.forEach(content => {
          content.style.opacity = '0'; // Set opacity to 0 for a fade-out effect
          content.style.display = 'none';
        });

        // Show the selected content area with a fade-in effect
        const selectedContent = document.getElementById(tabName + '-content');
        selectedContent.style.display = 'block';
        setTimeout(() => {
          selectedContent.style.opacity = '1'; // Set opacity to 1 for a fade-in effect
        }, 10); // Delay the opacity change to ensure transition effect

        // Optional: Scroll to the selected content area
        selectedContent.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });
  });
</script>
<script>
  function openModal() {
    const modal = document.getElementById('myModal');
    modal.style.display = 'flex';
  }

  function closeModal() {
    const modal = document.getElementById('myModal');
    modal.style.display = 'none';
  }
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const profileDropdownToggle = document.getElementById('profileDropdownToggle');
    const profileDropdownMenu = document.getElementById('profileDropdownMenu');
    const catalogDropdownToggle = document.getElementById('catalogDropdownToggle');
    const catalogDropdownMenu = document.getElementById('catalogDropdownMenu');

    profileDropdownToggle.addEventListener('click', function (e) {
      e.stopPropagation();
      profileDropdownMenu.classList.toggle('hidden');
    });

    catalogDropdownToggle.addEventListener('click', function (e) {
      e.stopPropagation();
      catalogDropdownMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', function (e) {
      const isProfileDropdown = profileDropdownToggle.contains(e.target) || profileDropdownMenu.contains(e.target);
      const isCatalogDropdown = catalogDropdownToggle.contains(e.target) || catalogDropdownMenu.contains(e.target);

      if (!isProfileDropdown) {
        profileDropdownMenu.classList.add('hidden');
      }

      if (!isCatalogDropdown) {
        catalogDropdownMenu.classList.add('hidden');
      }
    });

    // Set username with capital letter in the front
    const profileNameElement = document.querySelector('.profile_name');
    if (profileNameElement) {
      const username = '<?php echo $this->session->userdata('username'); ?>';
      const capitalizedUsername = username.charAt(0).toUpperCase() + username.slice(1);
      profileNameElement.textContent = capitalizedUsername;
    }
  });
</script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- LOGOUT -->
  <script>
    function confirmLogout() {
      Swal.fire({
        title: 'Apakah anda ingin Keluar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "<?php echo base_url('home') ?>";
        }
      });
    }
  </script>
</body>

</html>
