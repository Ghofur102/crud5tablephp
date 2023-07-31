<?php include('../template/auth/header.php') ?>
<body class="bg-gradient-to-br from-yellow-400 via-red-500 to-pink-500 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-96">
        <h2 class="text-3xl font-bold mb-6 text-center">Pendaftaran</h2>
        <form action="../auth/register-process.php" method="post">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nama</label>
                <input type="text" id="name" name="username" placeholder="Masukkan Nama"
                    class="w-full px-3 py-2 rounded-lg border-2 border-purple-400 focus:outline-none focus:border-purple-600"
                    required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email"
                    class="w-full px-3 py-2 rounded-lg border-2 border-green-400 focus:outline-none focus:border-green-600"
                    required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password"
                    class="w-full px-3 py-2 rounded-lg border-2 border-blue-400 focus:outline-none focus:border-blue-600"
                    required>
            </div>
            <div class="flex justify-center">
                <button type="submit" name="register"
                    class="px-6 py-3 rounded-full bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 text-white font-bold hover:bg-gradient-to-br hover:from-blue-500 hover:via-purple-600 hover:to-pink-600">
                    Daftar
                </button>
            </div>
        </form>
        <div class="mt-4 text-center">
            <p class="text-gray-700">Sudah punya akun?</p>
            <!-- Tambahkan tautan untuk menuju halaman login -->
            <a href="login.php"
                class="block text-blue-600 font-bold hover:underline mt-2">Masuk</a>
        </div>
    </div>
</body>
<?php include('../template/auth/footer.php') ?>
