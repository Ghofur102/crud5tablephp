<?php include('../template/auth/header.php') ?>

<body class="bg-gradient-to-br from-yellow-400 via-red-500 to-pink-500 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-96">
        <h2 class="text-3xl font-bold mb-6 text-center">Login</h2>
        <form action="../auth/login-process.php" method="post">
            <div class="mb-4">
                <label for="user" class="block text-gray-700 font-bold mb-2">Username/Email</label>
                <input type="text" id="user" name="user" placeholder="Masukkan Username/Email" class="w-full px-3 py-2 rounded-lg border-2 border-purple-400 focus:outline-none focus:border-purple-600" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" class="w-full px-3 py-2 rounded-lg border-2 border-blue-400 focus:outline-none focus:border-blue-600" required>
            </div>
            <div class="flex justify-center">
                <button type="submit" name="login" class="px-6 py-3 rounded-full bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 text-white font-bold hover:bg-gradient-to-br hover:from-blue-500 hover:via-purple-600 hover:to-pink-600">
                    Masuk
                </button>
            </div>
        </form>

        <div class="mt-4 text-center">
            <p class="text-gray-700">Belum punya akun?</p>
            <!-- Tambahkan tautan untuk menuju halaman register -->
            <a href="register.php" class="block text-blue-600 font-bold hover:underline mt-2">Daftar</a>
            <a href="" class="block text-blue-600 font-bold hover:underline mt-2">Lupa Password?</a>
        </div>
    </div>
</body>
<?php include('../template/auth/footer.php') ?>