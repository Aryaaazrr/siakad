<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home | ACHMAD ZAKARIYA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="icon" type="icon" href="{{ asset('assets/img/foto-formal.png') }}" />
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    @vite('resources/css/app.css')
</head>

<body>
    <!-- header start -->
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="/" class="font-bold text-lg text-primary block py-6">achmdzkry</a>
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-100 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-100 ease-in-out"></span>
                        <span class="hamburger-line transition duration-100 ease-in-out origin-bottom-left"></span>
                    </button>

                    <nav id="nav-menu"
                        class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none dark:bg-dark dark:shadow-slate-500 lg:dark:bg-transparent">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="#home"
                                    class=" text-base text-dark py-2 mx-8 flex group-hover:text-primary duration-500 dark:text-white">Beranda</a>
                            </li>
                            <li class="group">
                                <a href="#about"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary duration-500 dark:text-white">Tentang
                                    Saya</a>
                            </li>
                            <li class="group">
                                <a href="#portofolio"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary duration-500 dark:text-white">Portofolio</a>
                            </li>
                            <li class="group">
                                <a href="#client"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary duration-500 dark:text-white">Klien</a>
                            </li>
                            <li class="group">
                                <a href="#blog"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary duration-500 dark:text-white">Blog</a>
                            </li>
                            <li class="group">
                                <div class="flex">
                                    <button id="theme-toggle" type="button"
                                        class="text-gray-500 py-2 mx-8 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                            </path>
                                        </svg>
                                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                                fill-rule="evenodd" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </li>
                            <li class="group">
                                <a href="{{ route('login') }}"
                                    class="text-base font-semibold text-white flex bg-primary py-2 px-5 mx-8 my-5 rounded-full justify-center hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out lg:my-0">Login</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- hero section start -->
    <section id="home" class="pt-36 pb-28 dark:bg-dark">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 lg:w-1/2">
                    <h1 class="text-base font-semibold text-primary md:text-xl">Halo Semua 👋, Saya <span
                            class="block font-bold text-dark text-3xl mt-1 lg:w-1/2 dark:text-white">Achmad
                            Zakariya</span></h1>
                    <h2 class="font-medium text-secondary text-lg mb-5 lg:text-2xl">Mahasiswa <span
                            class="text-dark dark:text-white">Teknik Informatika</span></h2>
                    <p class="font-normal text-slate-400 mb-10 leading-relaxed">Orang lain gak akan bisa paham <i
                            class="text-dark dark:text-white">struggle</i> dan masa sulitnya kita, yang mereka ingin
                        tahu hanya bagian
                        <i class="text-dark dark:text-white">success stories</i>-nya saja. Berjuanglah untuk diri
                        sendiri walaupun gak
                        ada yang
                        tepuk tangan. Kelak diri kita di masa depan akan sangat bangga dengan apa yang kita perjuangkan
                        hari ini.
                    </p>

                    <a href="https://wa.me/6287863302407" target="_blank"
                        class=" text-base font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Hubungi
                        Saya</a>
                </div>
                <div class="w-full self-end px-4 lg:w-1/2">
                    <div class="relative mt-10 lg:mt-10 lg:right-0">
                        <img src="{{ asset('assets/img/foto-formal.png') }}" alt="Achmad Zakariya"
                            class="relative z-10 max-w-full mx-auto lg:mr-34 mr-28">
                        <span
                            class="absolute mt-10 ml-5 lg:ml-9 -bottom-0 -top-1 left-1/2 -right-1/2 -translate-x-1/2 md:scale-125 md:-right-1/2 lg:w-1/2 lg:top-12 lg:-right-1/2">
                            <svg width="250" height="300" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#06b6d4"
                                    d="M68.4,-39.8C82.5,-15.1,83.6,16.9,70,34.9C56.4,52.9,28.2,57,4.9,54.2C-18.3,51.3,-36.6,41.5,-46.4,25.7C-56.2,9.9,-57.4,-12,-48.3,-33.8C-39.1,-55.7,-19.5,-77.5,3.8,-79.7C27.2,-81.9,54.3,-64.5,68.4,-39.8Z"
                                    transform="translate(100 100) scale(1.1)" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero section end  -->

    <!-- about section start  -->
    <section id="about" class="pt-36 pb-32 dark:bg-dark">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3">Tentang Saya</h4>
                    <h2 class="font-bold text-dark text-3xl mb-5 max-w-lg dark:text-white">Sinopsis</h2>
                    <p class="font-medium text-base text-secondary">Seorang mahasiswa Teknik Informatika yang sangat
                        mudah beradaptasi dengan pengalaman luas dalam pengembangan situs web dan pemrograman perangkat
                        lunak. Saya siap menghadapi tantangan baru di dunia profesional dan berkontribusi positif pada
                        proyek yang saya ikuti. Didorong oleh semangat yang kuat untuk mempelajari pemrograman, saya
                        berusaha untuk secara konsisten memberikan hasil berkualitas tinggi sebagai bagian dari tim atau
                        mandiri.</p>
                </div>
                <div class="w-full px-4 lg:w-1/2">
                    <h3 class="font-semibold text-dark text-2xl mb-4 lg:text-3xl lg:pt-10 dark:text-white">Mari
                        Berteman</h3>
                    <p class="font-medium text-base text-secondary mb-6">Hai! Saya senang Anda berkunjung ke web
                        pribadi
                        saya. Ayo berkenalan dan bagikan ide, inspirasi, atau cerita Anda. Mari membangun hubungan yang
                        positif dan saling mendukung. Saya sangat menghargai teman-teman baru, jadi mari berhubungan dan
                        saling berbagi dalam perjalanan hidup ini. Mari tetap terhubung, saling bertukar pendapat, dan
                        Jangan sungkan untuk meninggalkan jejak atau mengirim pesan.
                    </p>
                    <div class="flex items-center">

                        <!-- instagram  -->
                        <a href="https://www.instagram.com/achmdzkry_" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white dark:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>Instagram</title>
                                <path
                                    d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                            </svg>
                        </a>

                        <!-- linkedin -->
                        <a href="https://linkedin.com/in/achmad-zakariya" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white dark:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>LinkedIn</title>
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>

                        <!-- github -->
                        <a href="https://github.com/Aryaaazrr" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white dark:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>GitHub</title>
                                <path
                                    d="M12 0C5.373 0 0 5.373 0 12c0 5.303 3.438 9.8 8.205 11.387.6.11.82-.261.82-.577v-2.243c-3.338.725-4.042-1.415-4.042-1.415-.546-1.387-1.333-1.758-1.333-1.758-1.091-.746.082-.731.082-.731 1.205.084 1.838 1.236 1.838 1.236 1.07 1.834 2.806 1.305 3.492.998.108-.774.418-1.305.762-1.605-2.665-.306-5.467-1.335-5.467-5.932 0-1.31.467-2.382 1.236-3.222-.124-.305-.535-1.534.117-3.194 0 0 1.008-.322 3.3 1.231a11.484 11.484 0 0 1 3.003-.404c1.019.004 2.043.138 3.003.404 2.291-1.553 3.297-1.231 3.297-1.231.653 1.66.242 2.889.118 3.194.77.84 1.236 1.912 1.236 3.222 0 4.607-2.805 5.622-5.476 5.921.43.372.823 1.102.823 2.222v3.293c0 .32.218.694.825.575C20.565 21.795 24 17.297 24 12c0-6.627-5.373-12-12-12z" />
                            </svg>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end  -->

    <!-- portofolio section start  -->
    <section id="portofolio" class="pt-36 pb-32 bg-slate-100 dark:bg-slate-800">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Portofolio</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4 dark:text-white">Project Terbaru</h2>
                    <p class="font-medium text-md text-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Iure adipisci labore natus voluptatum
                        dolores? Itaque hic natus accusantium iusto pariatur voluptatum, provident consequuntur. Fugit,
                        consectetur. Commodi ullam incidunt atque repellendus.</p>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center">
                @foreach ($portofolio as $item)
                    <a href="{{ $item->link }}" target="_blank" class="mb-12 p-4 md:w-1/2">
                        <div class="rounded-md shadow-md overflow-hidden">
                            <img src="{{ asset('cover/' . $item->cover) }}" alt="{{ $item->judul_portofolio }}"
                                class="w-full">
                        </div>
                        <h3 class="font-semibold text-xl text-dark mt-5 mb-3 dark:text-white">
                            {{ $item->judul_portofolio }}</h3>
                        <p class="font-medium text-base text-secondary">{{ $item->deskripsi }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- portofolio section end  -->

    <!-- client section start  -->
    <section id="client" class="pt-36 pb-32 bg-slate-700 dark:bg-slate-300">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Klien</h4>
                    <h2 class="font-bold text-white text-3xl mb-4 dark:text-dark">Yang Pernah Bekerjasama</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">Lorem ipsum dolor sit amet consectetur,
                        adipisicing
                        elit. Iure adipisci labore natus voluptatum
                        dolores? Itaque hic natus accusantium iusto pariatur voluptatum, provident consequuntur. Fugit,
                        consectetur. Commodi ullam incidunt atque repellendus.</p>
                </div>
            </div>
            <div class="w-full px-4">
                <div class="flex flex-wrap items-center justify-center">
                    @foreach ($client as $item)
                        <a href="{{ $item->link }}" target="_blank"
                            class="max-w-[100px] mx-4 py-4 mb-4 grayscale opacity-60 transition hover:grayscale-0 hover:opacity-100 lg:mx-5 xl:mx-6 xl:mb-0">
                            <img src="{{ asset('logo/' . $item->logo) }}" alt="logo_{{ $item->link }}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- client section end  -->

    <!-- blog section start  -->
    <section id="blog" class="pt-36 pb-32 bg-slate-100 dark:bg-dark">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Blog</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4 dark:text-white">Tulisan Terkini</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">Selamat datang di blog saya, tempat di
                        mana saya berbagi pandangan, pengetahuan, dan pengalaman. Jelajahi tulisan-tulisan terbaru yang
                        mencakup berbagai topik, mulai dari teknologi, kreativitas, hingga panduan praktis. Saya
                        berharap blog ini dapat menjadi sumber inspirasi dan wawasan bagi Anda.</p>
                </div>
            </div>
            <div class="flex flex-wrap">
                @foreach ($blog as $item)
                    <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10 dark:bg-slate-800">
                            <img width="360" height="200" src="{{ asset('cover/' . $item->cover) }}"
                                alt="{{ $item->judul_blog }}" class="w-full">
                            <div class="py-8 px-6">
                                <h3>
                                    <a href="/"
                                        class="block mb-3 font-semibold text-xl text-dark hover:text-primary truncate dark:text-white">{{ $item->judul_blog }}</a>
                                </h3>
                                <p class="font-medium text-base text-secondary mb-6">{{ $item->deskripsi }}</p>
                                <a href="/"
                                    class="font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:opacity-80">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- blog section end  -->

    <!-- footer section start  -->
    <footer class="bg-dark pt-24 pb-12 dark:bg-slate-700">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-12 text-slate-300 font-medium md:w-1/3">
                    <h2 class="font-bold text-4xl text-white mb-5">achmdzkry</h2>
                    <h3 class="font-bold text-2xl mb-2">Hubungi Saya</h3>
                    <p>achmadzakariya99@gmail.com</p>
                    <p>Jl. Veteran Gg 5 No 02 Barurambat Timur</p>
                    <p>Pamekasan</p>
                </div>
                <div class="w-full px-4 mb-12 md:w-1/3">
                    <h3 class="font-semibold text-xl text-white mb-5">Kategori Tulisan</h3>
                    <ul class="text-slate-300">
                        <li>
                            <a href="/" class="inline-block text-base hover:text-primary mb-3">Programming</a>
                        </li>
                    </ul>
                    <ul class="text-slate-300">
                        <li>
                            <a href="/" class="inline-block text-base hover:text-primary mb-3">Cryptocurency</a>
                        </li>
                    </ul>
                    <ul class="text-slate-300">
                        <li>
                            <a href="/" class="inline-block text-base hover:text-primary mb-3">Bussiness</a>
                        </li>
                    </ul>
                </div>
                <div class="w-full px-4 mb-12 md:w-1/3">
                    <h3 class="font-semibold text-xl text-white mb-5">Tautan</h3>
                    <ul class="text-slate-300">
                        <li>
                            <a href="#home" class="inline-block text-base hover:text-primary mb-3">Beranda</a>
                        </li>
                    </ul>
                    <ul class="text-slate-300">
                        <li>
                            <a href="#about" class="inline-block text-base hover:text-primary mb-3">Tentang Saya</a>
                        </li>
                    </ul>
                    <ul class="text-slate-300">
                        <li>
                            <a href="#portofolio"
                                class="inline-block text-base hover:text-primary mb-3">Portofolio</a>
                        </li>
                    </ul>
                    <ul class="text-slate-300">
                        <li>
                            <a href="#client" class="inline-block text-base hover:text-primary mb-3">Klien</a>
                        </li>
                    </ul>
                    <ul class="text-slate-300">
                        <li>
                            <a href="#blog" class="inline-block text-base hover:text-primary mb-3">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="w-full pt-10 border-t border-slate-700">
                <div class="flex items-center justify-center mb-5">
                    <!-- instagram  -->
                    <a href="https://www.instagram.com/achmdzkry_" target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                        <svg role="img" width="20" class="fill-current text-white" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Instagram</title>
                            <path
                                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                        </svg>
                    </a>

                    <!-- linkedin  -->
                    <a href="https://linkedin.com/in/achmad-zakariya" target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                        <svg role="img" width="20" class="fill-current text-white" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>LinkedIn</title>
                            <path
                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>

                    <a href="https://github.com/Aryaaazrr" target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                        <svg role="img" width="20" class="fill-current text-white" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>GitHub</title>
                            <path
                                d="M12 0C5.373 0 0 5.373 0 12c0 5.303 3.438 9.8 8.205 11.387.6.11.82-.261.82-.577v-2.243c-3.338.725-4.042-1.415-4.042-1.415-.546-1.387-1.333-1.758-1.333-1.758-1.091-.746.082-.731.082-.731 1.205.084 1.838 1.236 1.838 1.236 1.07 1.834 2.806 1.305 3.492.998.108-.774.418-1.305.762-1.605-2.665-.306-5.467-1.335-5.467-5.932 0-1.31.467-2.382 1.236-3.222-.124-.305-.535-1.534.117-3.194 0 0 1.008-.322 3.3 1.231a11.484 11.484 0 0 1 3.003-.404c1.019.004 2.043.138 3.003.404 2.291-1.553 3.297-1.231 3.297-1.231.653 1.66.242 2.889.118 3.194.77.84 1.236 1.912 1.236 3.222 0 4.607-2.805 5.622-5.476 5.921.43.372.823 1.102.823 2.222v3.293c0 .32.218.694.825.575C20.565 21.795 24 17.297 24 12c0-6.627-5.373-12-12-12z" />
                        </svg>
                    </a>

                </div>
                <p class="font-medium text-sm text-slate-500 text-center">@2023 | Dibuat oleh <a
                        href="https://www.instagram.com/achmdzkry_" target="_blank"
                        class="font-bold text-primary">Achmad Zakariya</a></p>
            </div>
        </div>
    </footer>
    <!-- footer section end  -->

    <!-- back to top start  -->
    <a href="#home"
        class="fixed hidden bottom-4 right-4 p-4 z-[9999] h-14 w-14 rounded-full bg-primary hover:animate-pulse"
        id="to-top">
        <span class="mt-2 ml-0.5 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
    </a>
    <!-- back to top end  -->

    @vite('resources/js/app.js')
</body>

</html>
