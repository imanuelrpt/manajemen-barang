<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Kategori</title>
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

  <!-- Konten Utama -->
  <main class="pt-20 md:pt-6 md:ml-64 px-4 md:px-8 py-6">
    <div class="max-w-5xl mx-auto">
      <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Daftar Kategori</h2>

      <!-- Tombol Tambah -->
      <div class="mb-6 flex justify-end">
        <a href="/kategori/create" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 shadow">
          + Tambah Kategori
        </a>
      </div>

      <!-- Tabel -->
      <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="w-full text-left border-collapse">
          <thead class="bg-gray-200">
            <tr>
              <th class="p-4 font-medium text-gray-700">ID</th>
              <th class="p-4 font-medium text-gray-700">Nama Kategori</th>
              <th class="p-4 font-medium text-center text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($kategori as $row) : ?>
              <tr class="border-b hover:bg-gray-100">
                <td class="p-4"><?= $row['id']; ?></td>
                <td class="p-4"><?= $row['nama_kategori']; ?></td>
                <td class="p-4 text-center space-x-2">
                  <a href="/kategori/edit/<?= $row['id']; ?>" class="text-yellow-500 hover:underline">Edit</a>
                  <span>|</span>
                  <a href="/kategori/delete/<?= $row['id']; ?>" class="text-red-500 hover:underline" onclick="return confirm('Hapus kategori ini?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- JS Sidebar Toggle -->
  <script>
    const menuBtn = document.getElementById('menu-btn');
    const closeBtn = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.remove('-translate-x-full');
    });

    closeBtn.addEventListener('click', () => {
      mobileMenu.classList.add('-translate-x-full');
    });
  </script>

</body>
</html>
