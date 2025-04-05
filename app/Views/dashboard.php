<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 flex">

<!-- Sidebar -->
<aside class="bg-white w-64 min-h-screen shadow-md p-6 hidden md:block fixed">
<a href="/dashboard" class="block w-fit">
  <h1 class="text-3xl font-bold text-primary mb-10 hover:text-blue-600 transition duration-200">
    Manajemen Barang
  </h1>
</a>
    <nav class="flex flex-col space-y-4">
        <a href="/kategori" class="text-gray-700 font-medium px-4 py-2 rounded-md transition duration-300 hover:bg-blue-100 hover:text-primary">📁 Kategori</a>
        <a href="/barang" class="text-gray-700 font-medium px-4 py-2 rounded-md transition duration-300 hover:bg-blue-100 hover:text-primary">📦 Barang</a>
        <a href="/transaksi" class="text-gray-700 font-medium px-4 py-2 rounded-md transition duration-300 hover:bg-blue-100 hover:text-primary">🔄 Transaksi</a>
        <a href="/logout" class="text-red-500 font-medium px-4 py-2 rounded-md transition duration-300 hover:bg-red-100 hover:text-red-600">🚪 Logout</a>
    </nav>
</aside>

    <!-- Mobile Navbar -->
    <header class="bg-white p-4 shadow-md flex justify-between items-center md:hidden w-full fixed z-50">
        <h1 class="text-xl font-bold text-primary">Manajemen Barang</h1>
        <button id="menu-btn" class="text-2xl text-gray-700 focus:outline-none">
            ☰
        </button>
    </header>

<!-- Mobile Sidebar (drawer) -->
<div id="mobile-menu" class="fixed top-0 left-0 w-64 bg-white h-full shadow-md transform -translate-x-full transition-transform duration-300 z-40 md:hidden p-6">
    <button id="close-menu" class="text-2xl mb-8 text-gray-700">✖</button>
    <nav class="flex flex-col space-y-4">
        <a href="/kategori" class="text-gray-700 font-medium px-4 py-2 rounded-md transition duration-300 hover:bg-blue-100 hover:text-primary">📁 Kategori</a>
        <a href="/barang" class="text-gray-700 font-medium px-4 py-2 rounded-md transition duration-300 hover:bg-blue-100 hover:text-primary">📦 Barang</a>
        <a href="/transaksi" class="text-gray-700 font-medium px-4 py-2 rounded-md transition duration-300 hover:bg-blue-100 hover:text-primary">🔄 Transaksi</a>
        <a href="/logout" class="text-red-500 font-medium px-4 py-2 rounded-md transition duration-300 hover:bg-red-100 hover:text-red-600">🚪 Logout</a>
    </nav>
</div>

    <!-- Main Content -->
    <main class="flex-1 md:ml-64 mt-20 md:mt-0 p-6">
        <div class="text-center">
            <h2 class="text-3xl font-bold">Selamat Datang, <?= session()->get('username'); ?>!</h2>
            <p class="mt-2 text-gray-700">Role: <span class="font-semibold"><?= session()->get('role'); ?></span></p>
        </div>

        <!-- Grid Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
            <!-- Kartu Total Barang -->
            <div class="p-6 bg-white shadow-lg rounded-lg flex items-center">
                <div class="bg-blue-500 text-white p-4 rounded-full text-xl">
                    📦
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold">Total Barang</h3>
                    <p class="text-xl font-bold"><?= $total_barang; ?></p>
                </div>
            </div>

            <!-- Kartu Kategori -->
            <div class="p-6 bg-white shadow-lg rounded-lg flex items-center">
                <div class="bg-green-500 text-white p-4 rounded-full text-xl">
                    🏷️
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold">Total Kategori</h3>
                    <p class="text-xl font-bold"><?= $total_kategori; ?></p>
                </div>
            </div>

            <!-- Kartu Total Transaksi -->
            <div class="p-6 bg-white shadow-lg rounded-lg flex items-center">
                <div class="bg-yellow-500 text-white p-4 rounded-full text-xl">
                    🔄
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold">Total Transaksi</h3>
                    <p class="text-xl font-bold"><?= $total_transaksi; ?></p>
                </div>
            </div>
        </div>
    </main>

    <!-- JS Toggle Sidebar -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const closeMenu = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('-translate-x-full');
        });

        closeMenu.addEventListener('click', () => {
            mobileMenu.classList.add('-translate-x-full');
        });
    </script>

</body>
</html>
