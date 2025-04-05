<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Barang</title>
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
    <h1 class="text-xl font-bold text-blue-600">Edit Barang</h1>
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

  <!-- Form Content -->
  <main class="md:ml-64 pt-20 p-6">
    <div class="w-full max-w-lg mx-auto p-6 bg-white rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold mb-4 text-center">Edit Barang</h2>

      <form action="/barang/update/<?= $barang['id'] ?>" method="POST" class="space-y-4">
  <div class="flex items-center gap-4">
    <label class="w-32 text-sm font-medium text-gray-600">Nama Barang</label>
    <input type="text" name="nama" value="<?= esc($barang['nama']) ?>" class="flex-1 px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
  </div>

  <div class="flex items-center gap-4">
    <label class="w-32 text-sm font-medium text-gray-600">Kategori</label>
    <select name="kategori_id" class="flex-1 px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
      <option value="">Pilih Kategori</option>
      <?php foreach ($kategori as $kat) : ?>
        <option value="<?= $kat['id'] ?>" <?= $barang['kategori_id'] == $kat['id'] ? 'selected' : '' ?>><?= esc($kat['nama_kategori']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="flex items-center gap-4">
    <label class="w-32 text-sm font-medium text-gray-600">Stok</label>
    <input type="number" name="stok" value="<?= esc($barang['stok']) ?>" class="flex-1 px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
  </div>

  <div class="flex items-center gap-4">
    <label class="w-32 text-sm font-medium text-gray-600">Harga</label>
    <input type="number" name="harga" value="<?= esc($barang['harga']) ?>" class="flex-1 px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
  </div>

  <div class="flex justify-end">
    <button type="submit" class="px-6 py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600">
      Update
    </button>
  </div>
</form>
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
