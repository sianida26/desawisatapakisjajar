<?php 
    $umkms = App\Models\Umkm::inRandomOrder()->limit(3)->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Wisata Pakisjajar</title>
    @vite('resources/css/app.css')
    @vite('resources/css/landingPage.css')
    @vite('resources/css/bootstrapIcons.css')
    {{-- @vite('default') --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="max-w-screen w-screen overflow-x-hidden montserrat">
    <section class="w-full h-screen p-4" id="profil">
        <div class="w-full h-full cover flex flex-col">
            {{-- Header --}}
            <header class="flex items-center justify-between px-4 py-4 text-white">
                {{-- left --}}
                <div>
                    <img class="krona-one h-12" src="{{ asset('logo_2.png') }}" />
                </div>

                {{-- right --}}
                <div>
                    <button id="menu-button" class="rounded-full w-10 h-10 focus:outline-white flex justify-center items-center md:hidden">
                        <i class="text-xl bi-grid-fill"></i>
                    </button>
                    <nav class="hidden md:flex gap-8 items-center krona-one text-sm">
                        <a href="#profil">Profil</a>
                        <a href="#umkm">UMKM</a>
                        <a href="#sampah">Manajemen Sampah</a>
                        <a href="/admin/login" class="btn py-2 px-3">Login</a>
                    </nav>
                </div>

                {{-- Sidebar --}}
                <div id="sidebar-root" class="fixed top-0 left-0 w-screen h-screen justify-end hidden md:hidden">
                    <div id="sidebar" class="w-48 h-full bg-white drop-shadow-2xl flex flex-col py-8 krona-one gap-6">
                        <h1 class="text-xl text-ijo text-center">LOGO</h1>
                        <nav class="flex flex-col text-slate-600 flex-grow">
                            <a href="#profil" class="focus:bg-ijo focus:text-white bg-opacity-30 px-4 py-2 focus:outline-none nav-item">Profil</a>
                            <a href="#umkm" class="focus:bg-ijo focus:text-white bg-opacity-30 px-4 py-2 focus:outline-none nav-item">UMKM</a>
                            <a href="#sampah" class="focus:bg-ijo focus:text-white bg-opacity-30 px-4 py-2 focus:outline-none nav-item">Manajemen Sampah</a>
                        </nav>
                        <div class="px-4">
                            <button class="btn w-full">
                                Login
                            </button>
                        </div>
                    </div>
                </div>
            </header>
            
            <div class="flex flex-col justify-center gap-16 flex-grow krona-one">
                <div class="text-white flex flex-col">
                    <p class="text-center">Welcome to</p>
                    <p class="text-center text-2xl lg:text-4xl">Desa Wisata Pakisjajar</p>
                </div>

                <div class="flex items-center justify-center md:flex-col md:gap-8">
                    <p class="hidden md:block montserrat text-center text-white px-12 lg:px-0 lg:max-w-screen-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et felis sagittis lorem pellentesque tempor. Proin venenatis, sapien vel pulvinar faucibus, enim risus dignissim tellus, vitae sodales dolor ipsum nec nibh. </p>
                    <a class="btn" href="/profil">Jelajahi Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    {{-- UMKM Section --}}
    <section class="w-screen min-h-screen py-8 bg-slate-100 lg:min-h-0" id="umkm">
        <div class="w-full flex flex-col krona-one items-center gap-2">
            <h1 class="text-ijo text-xl">Kunjungi UMKM Kami</h1>
            <span class="h-1 w-24 rounded-full bg-ijo"></span>
        </div>

        <div class="w-full px-4 mt-4 flex flex-col gap-4 md:grid md:grid-cols-3 lg:max-w-screen-lg lg:mx-auto lg:gap-8">
            @forEach($umkms as $umkm)
                <x-umkm-card :umkm="$umkm" />
            @endforeach
        </div>

        <div class="mt-4 flex justify-center md:mt-16">
            <a href="/umkm" class="btn krona-one">
                <i class="bi bi-shop text-xl gap-4"></i>
                Lihat UMKM Lainnya
            </a>
        </div>
    </section>

    {{-- Sampah Section --}}
    <section class="w-screen mt-8 md:mt-0">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="hidden md:inline-block">
                <img class="w-full aspect-square object-cover" src="https://dummyimage.com/500x500/808080/fff" />
            </div>
            <div class="flex flex-col items-center px-4 py-16 md:h-full md:justify-center">
                <h1 class="text-ijo text-2xl krona-one" id="sampah">Manajemen Sampah</h1>
                <span class="w-24 h-1 rounded-full bg-ijo mt-2"></span>
                <p class="text-center text-slate-600 font-medium mt-4 lg:px-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis auctor cursus pulvinar. Curabitur ut libero metus. Curabitur ante purus, ultricies quis lobortis at</p>
            </div>
        </div>
        <div class="w-full bg-slate-100 py-16 px-4 md:px-16 md:py-36 flex flex-col items-center krona-one">
            <p class="text-slate-700 text-lg text-center">Mari kita olah sampah organik menjadi sesuatu yang lebih bermanfaat dan bernilai jual</p>
            <a class="btn mt-4" href="/manajemen-sampah">
                <i class="bi bi-recycle"></i>
                Yuk olah sampah kita
            </a>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="w-full py-8 bg-ijo text-white flex flex-col items-center krona-one text-xs px-4 md:flex-row-reverse md:px-16 md:gap-16 xl:grid xl:grid-cols-3">
        <div class="md:flex-grow md:self-stretch md:mt-10 md:w-full xl:order-2">
            <p class="text-lg md:text-2xl text-center">Desa Wisata Pakisjajar</p>
            <p class="text-center md:mt-4">Desa Pakisjajar - Kec. Pakis - Kab. Malang</p>
        </div>
        <nav class="flex justify-between w-full mt-8 md:flex-col md:justify-start md:h-full md:self-stretch md:gap-4 md:mt-10 md:flex-shrink md:w-auto xl:order-1">
            <a href="#profil">Profil</a>
            <a href="#umkm">UMKM</a>
            <a href="#sampah">Manajemen Sampah</a>
        </nav>
        <div class="flex justify-center w-full text-xl gap-4 mt-8 md:flex-col md:w-auto">
            <span class="flex gap-6 items-center">
                <a href="#" class="bi bi-envelope"></a>
                <span class="hidden md:inline text-xs">desawisatapakisjajar@gmail.com</span>
            </span>
            <span class="flex gap-6 items-center">
                <a href="#" class="bi bi-telephone-fill"></a>
                <span class="hidden md:inline text-xs">08123456789</span>
            </span>
            <span class="flex gap-6 items-center">
                <a href="#" class="bi bi-instagram"></a>
                <span class="hidden md:inline text-xs">@desawisatapakisjajar</span>
            </span>
            <span class="flex gap-6 items-center">
                <a href="#" class="bi bi-facebook"></a>
                <span class="hidden md:inline text-xs">Desa Wisata Pakisjajar</span>
            </span>
            <span class="flex gap-6 items-center">
                <a href="#" class="bi bi-twitter"></a>
                <span class="hidden md:inline text-xs">@desawisatapakisjajar</span>
            </span>
            <span class="flex gap-6 items-center">
                <a href="#" class="bi bi-youtube"></a>
                <span class="hidden md:inline text-xs">Desa Wisata Pakisjajar</span>
            </span>
        </div>
    </footer>
    <div class="w-full py-4 bg-ijo flex justify-center">
        <span class="montserrat text-sm text-white">&copy; şans 2022</span>
    </div>

    <script>
      feather.replace()
    </script>
</body>
</html>