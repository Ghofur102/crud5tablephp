<?php

session_start();
if (!isset($_SESSION['role'])) {
    header('Location: auth-view/login.php');
}

if (isset($_SESSION['role']) == 'admin') {
    header('Location: admin/owners/readowners.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempat Penitipan Hewan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Navigasi -->
    <nav class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold">Tempat Penitipan Hewan</h1>
            <form action="auth/logout-process.php" method="post">
                <button type="submit" name="logout" class="text-red-500" onclick="return confirm('Yakin mau logout?')">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Informasi Tempat Penitipan Hewan -->
    <section class="py-8">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- Gambar Tempat Penitipan Hewan -->
                <div class="md:order-2">
                    <img src="assets/img/6fda29546fbec60aa1c00c3e951088a89d8ae255.jpg" alt="Tempat Penitipan Hewan" class="w-full h-auto rounded-lg shadow-md">
                </div>
                <!-- Detail Tempat Penitipan Hewan -->
                <div class="md:order-1">
                    <h2 class="text-2xl font-bold mb-4">Selamat Datang di Tempat Penitipan Hewan!</h2>
                    <p class="text-gray-700 mb-4">Kami adalah tempat penitipan hewan yang menyediakan lingkungan yang
                        nyaman dan menyenangkan untuk hewan kesayangan Anda. Dengan staf berpengalaman dan fasilitas
                        terbaik, kami akan menjaga hewan peliharaan Anda dengan penuh perhatian dan kasih sayang.</p>
                    <ul class="list-disc list-inside">
                        <li>Fasilitas lengkap dan modern</li>
                        <li>Perawatan oleh staf berpengalaman</li>
                        <li>Area bermain yang luas</li>
                        <li>Tempat bersih dan segar</li>
                        <li>Program khusus untuk anak-anak</li>
                        <li>Rekomendasi dari dokter hewan</li>
                    </ul>
                    <p class="text-gray-700 mt-4">Kunjungi kami sekarang untuk memberikan pengalaman terbaik untuk
                        hewan kesayangan Anda!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni dan Ulasan -->
    <section class="bg-white py-8">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-center">Apa Kata Mereka?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Ulasan 1 -->
                <div class="p-6 bg-yellow-100 rounded-lg shadow-md">
                    <p class="text-gray-700">"Tempat penitipan hewan yang luar biasa! Anjing saya sangat senang dan
                        rileks setiap kali menginap di sini. Staf sangat perhatian dan perawatan terhadap hewan sangat
                        terlihat. Tempatnya pun bersih dan terjaga dengan baik."</p>
                    <p class="text-blue-600 font-bold mt-2">- Amanda W.</p>
                </div>
                <!-- Ulasan 2 -->
                <div class="p-6 bg-green-100 rounded-lg shadow-md">
                    <p class="text-gray-700">"Tempat yang bagus untuk hewan peliharaan! Anak saya sangat senang
                        mengunjungi tempat ini, terutama karena area bermain yang luas dan banyak hewan lucu untuk
                        dipeluk."</p>
                    <p class="text-blue-600 font-bold mt-2">- Budi S.</p>
                </div>
                <!-- Ulasan 3 -->
                <div class="p-6 bg-pink-100 rounded-lg shadow-md">
                    <p class="text-gray-700">"Saya sangat puas dengan pelayanan di tempat ini. Anjing saya mendapat
                        perawatan yang sangat baik selama menginap. Tempatnya bersih dan segar, cocok untuk hewan
                        kesayangan."</p>
                    <p class="text-blue-600 font-bold mt-2">- Cinta D.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak dan Informasi Tambahan -->
    <section class="py-8">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-center">Kontak Kami</h2>
            <p class="text-center text-gray-700 mb-4">Silakan hubungi kami untuk informasi lebih lanjut atau untuk
                melakukan reservasi.</p>
            <div class="flex justify-center">
                <div class="bg-blue-500 text-white px-8 py-3 rounded-lg shadow-md">
                    <p class="font-bold">Telepon:</p>
                    <p>0812-345-6789</p>
                </div>
            </div>
            <div class="flex justify-center mt-4">
                <div class="bg-blue-500 text-white px-8 py-3 rounded-lg shadow-md">
                    <p class="font-bold">Alamat:</p>
                    <p>Jl. Hewan Bahagia No. 123</p>
                    <p>Kota Bahagia</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-500 text-white text-center py-4">
        <p>Hak Cipta © 2023 Tempat Penitipan Hewan. Semua Hak Dilindungi.</p>
    </footer>
</body>

</html>