<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Kategori</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Sidebar (Desktop) -->
  <aside class="bg-white w-64 min-h-screen shadow-md p-6 hidden md:block fixed">
  <a href="/dashboard" class="block w-fit">
  <h1 class="text-3xl font-bold text-primary mb-10 hover:text-blue-600 transition duration-200">
    Manajemen Barang
  </h1>
</a>
    <nav class="flex flex-col space-y-4">
      <a href="/kategori" class="text-gray-700 px-4 py-2 rounded-md transition hover:bg-blue-100 hover:text-blue-600">📁 Kategori</a>
      <a href="/barang" class="text-gray-700 px-4 py-2 rounded-md transition hover:bg-blue-100 hover:text-blue-600">📦 Barang</a>
      <a href="/transaksi" class="text-gray-700 px-4 py-2 rounded-md transition hover:bg-blue-100 hover:text-blue-600">🔄 Transaksi</a>
      <a href="/logout" class="text-red-500 px-4 py-2 rounded-md transition hover:bg-red-100 hover:text-red-600">🚪 Logout</a>
    </nav>
  </aside>

  <!-- Mobile Navbar -->
  <header class="bg-white p-4 shadow-md flex justify-between items-center md:hidden fixed top-0 left-0 right-0 z-50">
    <h1 class="text-xl font-bold text-blue-600">Manajemen Barang</h1>
    <button id="menu-btn" class="text-2xl text-gray-700 focus:outline-none">☰</button>
  </header>

  <!-- Mobile Sidebar -->
  <div id="mobile-menu" class="fixed top-0 left-0 w-64 h-full bg-white shadow-md transform -translate-x-full transition-transform duration-300 z-40 p-6 md:hidden">
    <button id="close-menu" class="text-2xl mb-8 text-gray-700">✖</button>
    <nav class="flex flex-col space-y-4">
      <a href="/kategori" class="text-gray-700 px-4 py-2 rounded-md transition hover:bg-blue-100 hover:text-blue-600">📁 Kategori</a>
      <a href="/barang" class="text-gray-700 px-4 py-2 rounded-md transition hover:bg-blue-100 hover:text-blue-600">📦 Barang</a>
      <a href="/transaksi" class="text-gray-700 px-4 py-2 rounded-md transition hover:bg-blue-100 hover:text-blue-600">🔄 Transaksi</a>
      <a href="/logout" class="text-red-500 px-4 py-2 rounded-md transition hover:bg-red-100 hover:text-red-600">🚪 Logout</a>
    </nav>
  </div>

  <!-- Main Content -->
  <main class="md:ml-64 p-4 pt-24 md:pt-10 flex justify-center items-center min-h-screen">
  <div class="bg-white mb-20 w-full max-w-2xl p-10 rounded-2xl shadow-xl">
  <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Tambah Kategori</h2>

  <!-- Error Validation -->
  <?php if (session()->getFlashdata('error')) : ?>
    <div class="mb-6 text-sm text-red-600 bg-red-100 p-4 rounded">
      <?= session()->getFlashdata('error'); ?>
    </div>
  <?php endif; ?>

  <form action="/kategori/store" method="POST" class="space-y-8">
    
    <!-- Floating Label Input -->
    <div class="relative z-0 w-full group">
      <input 
        type="text" 
        name="nama_kategori" 
        id="nama_kategori"
        class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 pt-6 pb-2 text-lg text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" 
        placeholder=" " 
        required 
      />
      <label 
        for="nama_kategori" 
        class="absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-4 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-2.5 peer-focus:scale-75 peer-focus:-translate-y-6 peer-focus:text-blue-600">
        Nama Kategori
      </label>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-between items-center">
      <a href="/kategori" class="px-6 py-3 bg-gray-500 text-white text-base rounded-md hover:bg-gray-600 transition">
        Kembali
      </a>
      <button type="submit" class="px-6 py-3 bg-blue-600 text-white text-base rounded-md hover:bg-blue-700 transition">
        Simpan
      </button>
    </div>
  </form>
</div>
  </main>

  <!-- Script Toggle Menu -->
  <script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenu = document.getElementById('close-menu');

    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.remove('-translate-x-full');
    });

    closeMenu.addEventListener('click', () => {
      mobileMenu.classList.add('-translate-x-full');
    });
  </script>

</body>
</html>
