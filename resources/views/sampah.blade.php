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
    <title>Manajemen Sampah</title>
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
    <section class="w-full h-96 px-4 bg-ijo" id="profil">
        <div class="w-full h-full flex flex-col">
            <header class="flex items-center justify-between px-4 py-4 text-white">
                {{-- left --}}
                <div>
                    <img class="object-cover krona-one h-12" src="{{ asset('logo_2.png') }}" />
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
            <div class="mt-14 flex-center flex-col krona-one">
                <h1 class="text-center text-white font-bold text-4xl">Manajemen Sampah</h1>
                <h1 class="text-center text-white font-bold text-4xl">Desa Pakisjajar</h1>
                <span class="h-1 w-56 rounded-full bg-white mt-5"></span>
            </div>
        </div>
    </section>

    {{-- Product section --}}
    <section class="w-screen min-h-screen py-8 px-8 lg:min-h-0">
        <div class="w-full flex flex-col krona-one items-center gap-2">
            <h1 class="text-ijo text-xl">Produk Kami</h1>
            <span class="h-1 w-24 rounded-full bg-ijo"></span>
        </div>

        <div class="w-full mt-8 flex gap-5 justify-around">
            <div class="flex flex-col gap-2 text-ijo font-semibold montserrat items-center">
                <img class="object-cover h-24 w-24 rounded-full" src="{{ asset('images/pupuk-kompos.jpg') }}"/>
                <span>Pupuk Cair</span>
            </div>
            <div class="flex flex-col gap-2 text-ijo font-semibold montserrat items-center">
                <img class="object-cover h-24 w-24 rounded-full" src="{{ asset('images/pupuk-kompos.jpg') }}"/>
                <span>Pupuk Padat</span>
            </div>
            <div class="flex flex-col gap-2 text-ijo font-semibold montserrat items-center">
                <img class="object-cover h-24 w-24 rounded-full" src="{{ asset('images/pupuk-kompos.jpg') }}"/>
                <span>Pupuk Cair</span>
            </div>
            <div class="flex flex-col gap-2 text-ijo font-semibold montserrat items-center">
                <img class="object-cover h-24 w-24 rounded-full" src="{{ asset('images/pupuk-kompos.jpg') }}"/>
                <span>Pupuk Padat</span>
            </div>
            <div class="flex flex-col gap-2 text-ijo font-semibold montserrat items-center">
                <img class="object-cover h-24 w-24 rounded-full" src="{{ asset('images/pupuk-kompos.jpg') }}"/>
                <span>Pupuk Cair</span>
            </div>
            <div class="flex flex-col gap-2 text-ijo font-semibold montserrat items-center">
                <img class="object-cover h-24 w-24 rounded-full" src="{{ asset('images/pupuk-kompos.jpg') }}"/>
                <span>Pupuk Padat</span>
            </div>
        </div>
    </section>

    {{-- Pengolahan Section --}}
    <section class="w-screen min-h-screen py-8 px-24 bg-slate-100 lg:min-h-0">
        <div class="w-full flex flex-col krona-one items-center gap-2">
            <h1 class="text-ijo text-xl">Pengolahan Sampah</h1>
            <span class="h-1 w-24 rounded-full bg-ijo"></span>
        </div>

        <div class="flex flex-col gap-5 text-slate-900 mt-8 max-w-screen-lg mx-auto leading-loose text-lg">
            <p class="indent-10">Sampah merupakan bahan tidak berguna atau bahan terbuang sebagai sisa suatu proses dalam kehidupan manusia. Sampah yang biasa dikenal diantaranya sampah padat dan sampah kering. Sampah diklasifikasikan menjadi :</p>
            <div class="flex pl-8">
                <ol class="list-decimal list-outside">
                    <li>Sampah organik : sampah yang sebagian besar tersusun atas senyawa organik. Dapat berupa sisa tanaman, hewan, atau kotoran yang mudah diuraikan.</li>
                    <li>Sampah anorganik : sampah yang tersusun oleh senyawa anorganik seperti logam, botol, plastik yang sulit untuk diuraikan.</li>
                </ol>
            </div>
            <p class="indent-10">Berdasarkan beberapa sumber penelitian diketahui bahwa di Indonesia, sisa tumbuhan mencapai 80-90% dari seluruh sampah. Hal ini memunculkan potensi untuk dimanfaatkan sebagai pupuk organik.</p>
            <p class="indent-10">Pupuk organik dapat berupa padat atau cair yang dibuat memanfaatkan aktivitas mikroba. Kecepatan dekomposisi pupuk bergantung pada mikroba ini sehingga perlu diperhatikan aerasi, media tumbuh, dan sumber makanan mikroba selama proses pengomposan. Mikroba yang digunakan dikenal sebagai effective microorganism (EM4). EM4 merupakan bahan yang membantu perbaikan struktur dan tekstur tanah dan berfungsi mempercepat proses pengomposan yang berlangsung secara semi anaerob. Di dalam EM4 terdapat beberapa organisme seperti Lactobacillus sp., Streptomyces sp., yeast, actinomycetes, dan bakteri fotosintetik. Proses fermentasi yang terjadi pada kondisi semi anaerob, pH rendah, kadar garam dan kadar gula tinggi, kandungan air sedang, suhu 40-50 derajat celcius. Ketersediaan unsur hara dalam pupuk organic dipengaruhi oleh lamanya waktu yang dibutuhkan bakteri untuk mendegradasi sampah.</p>

            <h1 class="text-ijo text-xl my-2 font-bold text-center bg-white">Cara Pengolahan Sampah</h1>
            <p class="indent-10">Cara pembuatan kompos (pupuk padat) dan pupuk organik cair dari sampah rumah tangga sangat mudah dan sederhana. Alat dan bahan yang diperlukan cukup murah dan mudah diperoleh.</p>
            <h1 class="text-ijo font-bold text-lg underline decoration-double decoration-2 underline-offset-4">1. Pupuk Kompos</h1>
            <p>Bahan :</p>
            <div class="flex pl-8">
                <ol class="list-disc list-outside">
                    <li>Sampah organik (sisa sayuran, nasi, sisa buah-buahan, dan seluruh sampah yang berasal dari bahan organik/bahan alami)</li>
                    <li>Serbuk gergaji / tanah  / pupuk kandang / dedaunan / sabut kelapa</li>
                    <li>Aktivator yaitu zat yang akan mengaktifkan kerja organisme pengurai sehingga akan mempercepat proses pembusukan dan penguraian bahan organik. Terdapat banyak jenis aktivator yang beredar di pasaran, yang umum digunakan salah satunya adalah EM4</li>
                    <li>Air</li>
                    <li>Molase atau gula jawa (dibutuhkan jika tidak banyak sampah organik yang mengandung gula)</li>
                </ol>
            </div>
            <p>Alat :</p>
            <div class="flex pl-8">
                <ol class="list-disc list-outside">
                    <li>Alat pemotong/pencacah misalnya pisau.</li>
                    <li>Tempat menampung sampah, dapat menggunakan ember bekas cat dan wadah bekas lainnya.</li>
                    <li>Alat pengaduk</li>
                    <li>Ember/wadah untuk melarutkan aktivator.</li>
                </ol>
            </div>
            <p>Cara membuat kompos dengan memanfaatkan sampah rumah tangga adalah sebagai berikut :</p>
            <div class="flex pl-10">
                <ol class="list-decimal list-outside">
                    <li>Cacah sampah organik rumah tangga hingga  berukuran kecil  (semakin kecil, semakin cepat pengomposan berlangsung)</li>
                    <li>Tambahkan kompos jadi/tanah/pupuk kandang/serbuk gergaji sebagai inokulan ke dalam wadah</li>
                    <li>Tambahkan limbah rumah tangga sisa makanan yang sudah dicacah sebelumnya</li>
                    <li>Larutkan aktivator dengan air menggunakan perbandingan 10 cc : 1 liter air. Tuangkan larutan aktivator/starter kompos (contoh : EM4) ke limbah. Aduk rata.</li>
                    <li>Ulangi perlakuan di setiap 10 cm limbah yang dimasukkan ke dalam wadah. Tambahkan lagi larutan aktivator bila campuran terlalu kering menggunakan semprotan</li>
                    <li>Masukkan semua limbah dalam wadah pengomposan</li>
                    <li>Tutup rapat</li>
                    <li>Aduk seminggu sekali agar aerasi (aliran udara) dalam wadah berlangsung baik. Selama proses pengomposan, suhu dalam wadah akan naik tanda bahwa mikroorganisme sedang bekerja</li>
                    <li>Memasuki minggu 7-8 pengomposan selesai, suhu dalam wadah normal kembali.</li>
                    <li>Kompos yang sudah jadi siap digunakan. Bisa dilakukan pengayakan  dan pengemasan untuk skala usaha.</li>
                    <li>Kompos yang baik berwarna cokleat kehitaman, berbau tanah, dan berbutir halus.</li>
                </ol>
            </div>
            <h1 class="text-ijo font-bold text-lg underline decoration-double decoration-2 underline-offset-4">2. Pupuk Organik Cair</h1>
            <div class="flex pl-10">
                <ol class="list-decimal list-outside">
                    <li>Disiapkan alat dan bahan yang dibutuhkan. Pada pembuatan pupuk cair ini bisa digunakan perbandingan bahan organik : EM 4 : Gula merah : Air putih =  bak kecil : 1 tutup botol : 1 tutup botol : air cucian beras / air putih secukupnya</li>
                    <li>Dicacah sampah organik dimasukkan ke dalam wadah</li>
                    <li>Dilarutkan aktivator EM4 ke dalam air </li>
                    <li>Ditambahkan aktivator dengan gula merah yang sudah dihancurkan atau molase</li>
                    <li>Dicampurkan terlebih dahulu larutan aktivator dengan molase agar bakteri aktif</li>
                    <li>Disiramkan campuran ke dalam wadah sampah organik</li>
                    <li>Diaduk kemudian dibiarkan selama sebulan</li>
                    <li>Dilakukan penyaringan sehingga diperoleh pupuk organik cair</li>
                </ol>
            </div>
        </div>
    </section>

</body>
</html>