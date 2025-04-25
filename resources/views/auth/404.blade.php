<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 Not Found | ACHMAD ZAKARIYA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="dist/output.css" rel="stylesheet" />
    <link rel="icon" type="icon" href="{{ asset('assets/img/foto-formal.png') }}" />
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex items-center justify-center h-screen">
        <div class="flex-col space-y-4 text-center">
            <div class="text-primary text-xl font-medium">achmdzkry</div>
            <div class="text-3xl font-medium">Anda Bukan Admin</div>
            <div class="text-gray-500">
                Maaf, halaman yang Anda cari tidak tersedia.
            </div>
            <div class="flex items-center justify-center">
                <div class="bg-primary px-4 py-1 text-white font-medium rounded-lg hover:scale-105 cursor-pointer">
                    <a href="/">Kunjungi Beranda</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
