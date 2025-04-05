<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Transaksi</title>
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

  <!-- Mobile Sidebar (Drawer) -->
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
  <main class="md:ml-64 mt-20 md:mt-0 px-4 md:px-8 py-8">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-3xl font-bold text-center mb-6">Riwayat Transaksi</h2>

      <!-- Tombol Tambah -->
      <div class="mb-4 text-right">
        <a href="/transaksi/create" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition">
          + Tambah Transaksi
        </a>
      </div>

      <!-- Tabel -->
      <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="w-full text-left border-collapse min-w-[600px]">
          <thead>
            <tr class="bg-gray-200 text-gray-700">
              <th class="p-3">ID</th>
              <th class="p-3">Nama Barang</th>
              <th class="p-3">Jenis</th>
              <th class="p-3">Jumlah</th>
              <th class="p-3">Tanggal</th>
              <th class="p-3 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($transaksi as $row) : ?>
              <tr class="border-b hover:bg-gray-50 text-gray-700">
                <td class="p-3"><?= $row['id']; ?></td>
                <td class="p-3"><?= esc($row['nama_barang']) ?></td>
                <td class="p-3">
                  <span class="px-2 py-1 text-white text-sm rounded-md <?= $row['jenis'] == 'masuk' ? 'bg-blue-500' : 'bg-red-500'; ?>">
                    <?= ucfirst($row['jenis']); ?>
                  </span>
                </td>
                <td class="p-3"><?= $row['jumlah']; ?></td>
                <td class="p-3"><?= date('d M Y', strtotime($row['tanggal'])); ?></td>
                <td class="p-3 text-center">
                  <a href="/transaksi/delete/<?= $row['id']; ?>" class="text-red-500 hover:underline text-sm" onclick="return confirm('Hapus transaksi ini?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- Script Mobile Menu -->
  <script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeBtn = document.getElementById('close-menu');

    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.remove('-translate-x-full');
    });

    closeBtn.addEventListener('click', () => {
      mobileMenu.classList.add('-translate-x-full');
    });
  </script>

</body>
</html>
