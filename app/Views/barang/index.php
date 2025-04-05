<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manajemen Barang</title>
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

  <!-- Konten -->
  <main class="md:ml-64 pt-20 p-6">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold mb-4 text-center">Daftar Barang</h2>

      <a href="/barang/create" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Tambah Barang</a>

      <table class="w-full mt-4 border-collapse border border-gray-300">
        <thead>
          <tr class="bg-gray-200">
            <th class="border p-2">#</th>
            <th class="border p-2">Nama</th>
            <th class="border p-2">Kategori</th>
            <th class="border p-2">Stok</th>
            <th class="border p-2">Harga</th>
            <th class="border p-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($barang as $key => $item) : ?>
          <tr class="text-center">
            <td class="border p-2"><?= $key + 1 ?></td>
            <td class="border p-2"><?= esc($item['nama']) ?></td>
            <td class="border p-2"><?= esc($item['kategori_nama']) ?></td>
            <td class="border p-2"><?= esc($item['stok']) ?></td>
            <td class="border p-2">Rp<?= number_format($item['harga'], 2, ',', '.') ?></td>
            <td class="border p-2">
              <a href="/barang/edit/<?= $item['id'] ?>" class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Edit</a>
              <a href="/barang/delete/<?= $item['id'] ?>" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>

  <script>
    const menuBtn = document.getElementById("menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    const closeMenu = document.getElementById("close-menu");

    menuBtn.addEventListener("click", () => {
      mobileMenu.classList.remove("-translate-x-full");
    });

    closeMenu.addEventListener("click", () => {
      mobileMenu.classList.add("-translate-x-full");
    });
  </script>

</body>
</html>
