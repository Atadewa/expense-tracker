<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .grid-item {
                @apply bg-white rounded-lg shadow-xl py-3 px-4 md:col-span-2 hover:bg-sky-300 hover:shadow-2xl;
            }
        }
    </style>
    <style>
        body {
            font-family: 'Poppins';
        }
    </style>
</head>
<body class="bg-[#F4F6FF] font-poppins">

    <!-- Header -->
    <?php include './includes/header.html'; ?>

    <!-- Hero Section -->
    <section>
        <div class="container flex flex-wrap px-5 pt-11 md:max-w-5xl mx-auto md:pt-10">
            <div class="w-full md:w-3/5 flex flex-col justify-center">
                <h2 class="text-teal-500 font-bold text-xl md:text-xl">Selamat Datang di Expense Tracker</h2>
                <h1 class="pt-1 font-extrabold text-3xl md:text-4xl text-primary">Kelola Keuanganmu</h1>
                <p class="pt-1 pb-2 font-semibold text-sm md:text-lg text-primary inline-block">Catat setiap pengeluaran dan wujudkan tujuan finansialmu dengan tenang</p>
                <div class="mt-2.5">
                    <a href="./pages/view.php" class="bg-teal-500 font-semibold text-sm md:text-base py-3 px-7 rounded-full shadow-lg hover:bg-teal-600 focus:ring text-white">Mulai Catat</a>
                </div>
            </div>
            <div class="w-full md:w-2/5 flex justify-center">
                <img src="./img/hero-section-2.png" alt="Expense Tracker" class="w-full">
            </div>
        </div>
    </section>

    <!-- Description Section -->
    <section>
        <div class="bg-gradient-to-b from-teal-500 to-blue-500 from-40% pt-20 mt-20 w-full px-5 text-primary pb-28">
            <div class="max-w-4xl mx-auto text-center text-[#F4F6FF]">
                <h1 class="font-bold text-2xl md:text-3xl">Apa itu Expense Tracker?</h1>
                <div class="mt-9 max-w-xl mx-auto flex justify-center">
                    <img src="./img/description.png" alt="Deskripsi Expense Tracker" class="object-cover">
                </div>
                <p class="mt-9 md:mt-12 text-base md:text-lg font-medium md:font-semibold text-left md:text-center">
                    Expense Tracker adalah platform yang membantumu dalam mencatat dan mengelola pengeluaran. Dengan mencatat setiap transaksi, kamu bisa memahami pola pengeluaran dan menjaga kestabilan keuangan. Ciptakan masa depan finansial yang lebih baik mulai dari sini.
                </p>
            </div>
            <div id="tips" class="mt-10 pt-9 max-w-4xl mx-auto md:mt-28">
                <h1 class="font-bold text-2xl text-center md:text-3xl">Tips</h1>
                <div class="grid grid-cols-1 md:grid-cols-4 mt-8 gap-6">
                    <div class="grid-item">
                        <h2 class="text-base font-semibold">Tentukan Prioritas Pengeluaran</h2>
                        <p class="text-sm mt-0.5">Fokus pada kebutuhan utama seperti makanan dan pendidikan untuk pengelolaan yang bijak.</p>
                    </div>                    
                    <div class="grid-item">
                        <h2 class="text-base font-semibold">Catat Semua Pengeluaran</h2>
                        <p class="text-sm mt-0.5">Dari kecil hingga besar, catat setiap transaksi agar kamu punya gambaran utuh tentang keuanganmu.</p>
                    </div>                    
                    <div class="grid-item">
                        <h2 class="text-base font-semibold">Buat Anggaran Realistis</h2>
                        <p class="text-sm mt-0.5">Tetapkan anggaran yang sesuai dengan kebutuhan dan gaya hidupmu.</p>
                    </div>                   
                    <div class="grid-item">
                        <h2 class="text-base font-semibold">Sisihkan untuk Tabungan</h2>
                        <p class="text-sm mt-0.5">Penting untuk selalu menyisihkan sebagian pendapatan untuk masa depan.</p>
                    </div>                    
                    <div class="grid-item">
                        <h2 class="text-base font-semibold">Review Secara Berkala</h2>
                        <p class="text-sm mt-0.5">Periksa ulang catatan keuanganmu agar tetap selaras dengan tujuan hidupmu.</p>
                    </div>
                    <div class="grid-item">
                        <h2 class="text-base font-semibold">Kurangi Pengeluaran Tidak Penting</h2>
                        <p class="text-sm mt-0.5">Kenali pengeluaran yang bisa dihemat untuk menambah tabungan.</p>
                    </div>
                    <div class="grid-item md:col-start-2">
                        <h2 class="text-base font-semibold">Gunakan Alat Bantu Keuangan</h2>
                        <p class="text-sm mt-0.5">Gunakan aplikasi atau spreadsheet untuk mencatat dan mengelola keuangan lebih mudah.</p>
                    </div>           
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include './includes/footer.html'; ?>
</body>
</html>
