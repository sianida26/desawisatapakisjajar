<?php 
    $umkms = Illuminate\Support\Facades\DB::table('umkms')->where('name','like','%'.request()->query('q').'%')->get();
    // $umkms = App\Models\Umkm::inRandomOrder()->limit(12)->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UMKM</title>
    @vite('resources/css/app.css')
    @vite('resources/css/landingPage.css')
    @vite('resources/css/bootstrapIcons.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="max-w-screen w-screen overflow-x-hidden montserrat">
    <section class="w-full px-4 bg-ijo" id="profil">
        <div class="w-full flex flex-col">
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
                        <a href="/login" class="btn py-2 px-3">Login</a>
                    </nav>
                </div>

                {{-- Sidebar --}}
                <div id="sidebar-root" class="fixed top-0 left-0 w-screen h-screen justify-end hidden md:hidden z-10">
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
            <div class="mt-8 flex-center flex-col gap-4 krona-one">
                <h1 class="text-center text-white font-bold text-2xl">UMKM Bu Fulan</h1>
                <p class="text-white montserrat">bu fulan</p>
            </div>
        </div>
    </section>
    <section class="px-4 md:px-8 py-12 flex flex-col items-center w-full max-w-screen-xl mx-auto">
        <div class="w-full flex-center">
            <img class="w-full object-cover aspect-[267/176]" src="https://dummyimage.com/267x176/808080/fff" />
        </div>

        <div class="w-full">
            <table></table>
        </div>
    </section>
</body>
</html>