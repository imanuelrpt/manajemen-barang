<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Transaksi</title>
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
  <main class="md:ml-64 mt-20 md:mt-0 px-4 md:px-8 py-6">
  <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Tambah Transaksi</h2>

    <form action="/transaksi/store" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
      
      <!-- Barang -->
      <div>
        <label for="barang_id" class="block font-medium mb-1">Barang</label>
        <select name="barang_id" id="barang_id" class="w-full px-3 py-2 border rounded-md" required>
          <?php foreach ($barang as $b): ?>
            <option value="<?= $b['id']; ?>"><?= esc($b['nama']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Jenis Transaksi -->
      <div>
        <label for="jenis" class="block font-medium mb-1">Jenis Transaksi</label>
        <select name="jenis" id="jenis" class="w-full px-3 py-2 border rounded-md" required>
          <option value="masuk">Masuk</option>
          <option value="keluar">Keluar</option>
        </select>
      </div>

      <!-- Jumlah -->
      <div>
        <label for="jumlah" class="block font-medium mb-1">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" class="w-full px-3 py-2 border rounded-md" required>
      </div>

      <!-- Tanggal -->
      <div>
        <label for="tanggal" class="block font-medium mb-1">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="w-full px-3 py-2 border rounded-md" required>
      </div>

      <!-- Tombol -->
      <div class="md:col-span-2 flex justify-between pt-4">
        <a href="/transaksi" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Kembali</a>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Simpan</button>
      </div>
    </form>
  </div>
</main>


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
