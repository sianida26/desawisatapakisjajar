<?php 
    // $umkms = Illuminate\Support\Facades\DB::table('umkms')->where('name','like','%'.request()->query('q').'%')->get();
    // $umkms = App\Models\Umkm::inRandomOrder()->limit(12)->get();
    $umkm = App\Models\Umkm::findOrFail(request()->route('id'));
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
            <div class="flex-center flex-col gap-4 krona-one">
                {{-- <h1 class="text-center text-white font-bold text-2xl">UMKM Bu Fulan</h1> --}}
                {{-- <p class="text-white montserrat">bu fulan</p> --}}
            </div>
        </div>
    </section>
    <div>

        <h1 class="font-bold text-3xl mt-4 text-center">
            {{ $umkm->name }}
        </h1>
        <div class="h-1 rounded-full bg-ijo w-56 mx-auto"></div>
    </div>
    <section class="px-4 mt-4 md:px-8 py-4 flex flex-col items-center w-full max-w-screen-xl mx-auto md:flex-row md:gap-4 md:flex-start">
        <div class="w-full flex flex-col items-center">
            <img class="w-full object-contain aspect-[267/176]" src="{{ $umkm->getPhoto() }}" />
            @if ($umkm->whatsapp)
                <a type="button" target="_blank" href="https://wa.me/{{ $umkm->whatsapp }}?text=Halo%20kak%2C%20Saya%20ingin%20bertanya%20tentang%20link%20google%20maps%20alamat%20toko%20Bapak%2FIbu%2C%20terimakasih." class="bg-[#25D366] rounded-md flex items-center gap-2 py-3 px-4 text-white font-medium mt-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#25D366]">
                    <i class="bi bi-whatsapp"></i>
                    <span class="font-medium roboto">Hubungi via Whatsapp</span>
                </a>
            @else
                <button type="button" disabled class="bg-[#25D366] rounded-md flex items-center gap-2 py-3 px-4 text-white font-medium mt-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#25D366] opacity-70">
                    <i class="bi bi-whatsapp"></i>
                    <span class="font-medium roboto">Hubungi via Whatsapp</span>
                </button>
            @endif
        </div>

        <table class="w-full mt-4 md:-mt-4 md:ml-8">
            <tbody>
                <tr>
                    <td class="py-2">Jenis Usaha:</td>
                    <td>{{ $umkm->jenis_usaha }}</td>
                </tr>
                <tr>
                    <td class="py-2">Nama Pemilik:</td>
                    <td>{{ $umkm->owner->name }}</td>
                </tr>
                <tr>
                    <td class="py-2">Alamat:</td>
                    <td>{{ $umkm->address }}</td>
                </tr>
                <tr>
                    <td class="py-2">No. Telepon:</td>
                    <td>{{ $umkm->phone ? preg_replace('/^62/','0',$umkm->phone) : "-" }} </td>
                </tr>
                <tr>
                    <td class="py-2">No. Whatsapp:</td>
                    <td>{{ $umkm->whatsapp ? preg_replace('/^62/','0',$umkm->whatsapp) : "-" }} </td>
                </tr>
                <tr>
                    <td class="py-2">E-mail:</td>
                    <td>{{ preg_match('/\@desawisatapakisjajar\.com$/',$umkm->owner->email) ? '-' : $umkm->owner->email }}</td>
                </tr>
                <tr>
                    <td class="py-2">Akun Instagram:</td>
                    <td>
                        @if ($umkm->ig)
                            <a href="https://instagram.com/{{ $umkm->ig }}" target="_blank">{{ $umkm->ig }} <i class="bi bi-instagram"></i></i></a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="py-2">Shopee:</td>
                    <td>
                        @if($umkm->shopee)
                            <div>
                                <a href="{{ $umkm->shopee }}" type="button" target="_blank" class="bg-[#EE4D2D] rounded-md flex items-center gap-2 py-3 px-4 text-white font-medium mt-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#EE4D2D] w-max">
                                    Buka di Shopee
                                </a>
                            </div>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <a type="button" target="_blank" href="https://wa.me/{{ "6287771018445" }}?text=Halo%20kak%2C%20Saya%20ingin%20bertanya%20tentang%20link%20google%20maps%20alamat%20toko%20Bapak%2FIbu%2C%20terimakasih." class="bg-[#25D366] rounded-md flex md:hidden items-center gap-2 py-3 px-4 text-white font-medium mt-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#25D366]">
            <i class="bi bi-whatsapp"></i>
            <span class="font-medium roboto">Hubungi pemilik UMKM via Whatsapp</span>
        </a>
    </section>
</body>
</html>