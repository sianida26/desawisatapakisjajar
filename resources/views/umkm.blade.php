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
    @vite('default')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="max-w-screen w-screen overflow-x-hidden montserrat">
    <section class="w-full h-96 px-4 bg-ijo" id="profil">
        <div class="w-full h-full flex flex-col">
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
            <div class="mt-24 flex-center flex-col gap-4 krona-one">
                <h1 class="text-center text-white font-bold text-4xl">UMKM Desa Pakisjajar</h1>
                <p class="text-white montserrat">UMKM Maju Terus....</p>
            </div>
        </div>
    </section>
    <section class="px-4 md:px-8 py-12 flex flex-col items-center w-full max-w-screen-xl mx-auto">
        <form class="relative mx-auto w-full max-w-screen-sm">
            <span class="absolute left-0 top-0 h-full px-4 w-12 rounded-md bg-ijo flex-center text-white">
                <i class="bi bi-search"></i>
            </span>
            <input name="q" value="{{ request()->query('q') }}" class="w-full py-2 pr-3 pl-14 border-2 border-ijo rounded-md focus:outline-ijo focus:shadow-sm focus:shadow-ijo placeholder:italic" placeholder="Cari UMKM..." />
        </form>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-8 gap-4 md:gap-8">
            @foreach($umkms as $umkm)
                <x-umkm-card :umkm="$umkm" />
            @endforeach
        </div>
    </section>
</body>
</html>