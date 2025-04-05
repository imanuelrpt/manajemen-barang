<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    input:focus {
      transform: scale(1.02);
      transition: transform 0.2s ease-in-out;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

  <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden w-full max-w-4xl">
    
    <!-- Gambar/Icon Kiri -->
    <div class="hidden md:flex items-center justify-center bg-blue-100 w-1/2 p-6">
      <img src="https://cdn-icons-png.flaticon.com/512/3064/3064197.png" alt="Login Icon" class="w-64 h-64">
    </div>

    <!-- Form Login -->
    <div class="w-full md:w-1/2 p-8">
      <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">Login</h2>

      <?php if (session()->getFlashdata('error')) : ?>
        <p class="mb-4 text-sm font-medium text-red-600 text-center"><?= session()->getFlashdata('error') ?></p>
      <?php endif; ?>

      <form action="/login" method="POST">
        <div class="mb-6">
          <label class="block mb-1 text-gray-700 font-medium">Username</label>
          <input 
            type="text" 
            name="username" 
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all" 
            required
          >
        </div>

        <div class="mb-6">
          <label class="block mb-1 text-gray-700 font-medium">Password</label>
          <input 
            type="password" 
            name="password" 
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all" 
            required
          >
        </div>

        <button 
          type="submit" 
          class="w-full bg-blue-500 text-white font-semibold py-3 rounded-lg hover:bg-blue-600 transition-all"
        >
          Login
        </button>
      </form>

      <p class="mt-6 text-center text-gray-600 text-sm">
        Belum punya akun? 
        <a href="/register" class="text-blue-500 font-medium hover:underline">Daftar di sini</a>
      </p>
    </div>
  </div>

</body>
</html>
