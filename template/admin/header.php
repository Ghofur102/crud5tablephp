<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Hewan Peliharaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      position: relative;
    }

    .content {
      min-height: calc(100% - 2.75rem); /* Tinggi konten halaman */
    }
  </style>
</head>

<body class="">
    <!-- Navbar -->
    <nav class="bg-blue-500 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-2xl font-bold">Admin Hewan Peliharaan</h1>
            <ul class="flex space-x-4">
                <li><a href="../../admin/owners/readowners.php" class="hover:underline">Owners</a></li>
                <li><a href="../../admin/pets/readpets.php" class="hover:underline">Pets</a></li>
                <li><a href="../../admin/safekeepings/readsafekeepings.php" class="hover:underline">Safekeepings</a></li>
                <li><a href="../../admin/stok/readstok.php" class="hover:underline">Stok</a></li>
                <li><a href="../../admin/employees/reademployees.php" class="hover:underline">Employees</a></li>
                <li>
                    <form action="../../auth/logout-process.php" method="post">
                        <button type="submit" name="logout" class="text-red-500" onclick="return confirm('Yakin mau logout?')">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="content">