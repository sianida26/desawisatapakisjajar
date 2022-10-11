<?php

namespace Database\Seeders;

use App\Models\Umkm;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $umkms = [
            ['umkm_name' => 'Sempol Bu SIti Masiro', 'jenis_usaha' => 'Usaha Sempol dan Cilok', 'owner_name' => 'Siti Masiro', 'address' => 'Ledok Dowo RT 3 / RW 4 Pakisjajar, Pakis, 65154', 'phone' => '6288805866855', 'whatsapp' => '6288805866855', 'email' => 'siti.masiro@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Toko Sembako Pak Miftachul Ulumia', 'jenis_usaha' => 'Toko Sembako', 'owner_name' => 'Miftachul Ulumia', 'address' => 'Dsn. Krajan, Jl. Ledok Dowo, RT 3 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6285733101150', 'email' => 'haidarazam56@gmail.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Tempe Pak Sugiarto', 'jenis_usaha' => 'Usaha Temp', 'owner_name' => 'Sugiarto', 'address' => 'Ledok Dowo RT 3 / RW 4 Pakisjajar, Pakis, 65154', 'phone' => '6285102669766', 'whatsapp' => '6285102669766', 'email' => 'sugiarto@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Dua Putri', 'jenis_usaha' => 'Kripik Bahan Alam', 'owner_name' => 'Evi Yunani', 'address' => 'Dsn. Krajan, Jl. Ledok Dowo, RT 3 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6281332099454', 'email' => 'evi.yunani@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Aneka Krupuk RHR', 'jenis_usaha' => 'Segala Macam Krupuk', 'owner_name' => 'Azizur Rohmah', 'address' => 'Dsn. Krajan, Jl. Ledok Dowo, RT 3 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6281217147184', 'email' => 'azizur.rohmah@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Cilok Daging Pak Khoqim', 'jenis_usaha' => 'Cilok Daging', 'owner_name' => 'Muhammad Khoqim Widodo', 'address' => 'Dsn. Krajan, Jl. Ledok Dowo, RT 4 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6281357866620', 'email' => 'muhammad.khoqim@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Bakso Sapi Bu Anita', 'jenis_usaha' => 'Bakso Sapi', 'owner_name' => 'Anita Mariana', 'address' => 'Dsn. Krajan, Jl. Ledok Dowo, RT 4 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6281556633069', 'email' => 'anita.mariana@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Mie Ayam & Bakso Bu Zumrotul', 'jenis_usaha' => 'Mie Ayam Bakso', 'owner_name' => 'Zumrotul Ulumi', 'address' => 'Dsn. Krajan, Jl. Ledok Dowo, RT 4 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '628813380831', 'email' => 'zumrotul.ulumi@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Mie Ayam Bu Kasiati', 'jenis_usaha' => 'Mie Ayam', 'owner_name' => 'Kasiati', 'address' => 'Dsn. Krajan, Jl. Ledok Dowo, RT 4 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6283834222660', 'email' => 'kasiati@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Es Buah Pak Nurali', 'jenis_usaha' => 'Es Buah', 'owner_name' => 'Moh Nurali Farhan', 'address' => 'Dsn. Krajan, Jl. Ledok Dowo, RT 4 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6285259302905', 'email' => 'moh.nurali@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Tempura dan Sosis Bakar Pak Gofur', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Moch. Gofur', 'address' => 'Dsn. Krajan, Jl. Ledok Dowo, RT 4 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6285875387947', 'email' => 'moch.gofur@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Warung Bu Romlah', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Romlah', 'address' => 'Ledok Dowo RT 5 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6281249549557', 'email' => 'romlah@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Cilok Bu Siti', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Siti Mai Saroh', 'address' => 'Ledok Dowo RT 5 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6285843740212', 'email' => 'siti.mai@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Jamur Pak Setiawan', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Setiawan Dwi Widodo', 'address' => 'Ledok Dowo RT 5 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => null, 'email' => 'setiawan.dwi@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Toko Sembako Bu Nurhayati', 'jenis_usaha' => 'Toko Sembako', 'owner_name' => 'Nur Hayati', 'address' => 'Jl. Ledok Dowo RT 6 / RW 4, Pakisjajar, Pakis', 'phone' => '6288235622302', 'whatsapp' => '6288235622302', 'email' => 'nur.hayati@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Toko Sembako Bu Jumroti', 'jenis_usaha' => 'Toko Sembako', 'owner_name' => 'Jumroti', 'address' => 'Jl. Ledok Dowo RT 6 / RW 4, Pakisjajar, Pakis', 'phone' => '6282148759832', 'whatsapp' => '6282148759832', 'email' => 'jumroti@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Toko Sembako Pak Sumedi', 'jenis_usaha' => 'Toko Sembako', 'owner_name' => 'Sumedi', 'address' => 'Jl. Ledok Dowo RT 6 / RW 4, Pakisjajar, Pakis', 'phone' => '6282213139593', 'whatsapp' => '6282213139593', 'email' => 'sumedi@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Rujak Bu Sumak Ya', 'jenis_usaha' => 'Jualan Rujak', 'owner_name' => 'Sumak Ya', 'address' => 'Jl. Ledok Dowo RT 6 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6289672658013', 'email' => 'sumak.ya@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Toko Sembako Bu Sri', 'jenis_usaha' => 'Toko Sembako', 'owner_name' => 'Sri Wijayanti', 'address' => 'Jl. Ledok Dowo RT 6 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6289672658013', 'email' => 'sri.wijayanti@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Bubur Pak Rosidi', 'jenis_usaha' => 'Jualan Bubur', 'owner_name' => 'Rosidi', 'address' => 'Jl. Ledok Dowo RT 6 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6285855457718', 'email' => 'rosidi@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Mie Biting Bu Istikomah', 'jenis_usaha' => 'Jual Mie Biting', 'owner_name' => 'Istikomah', 'address' => 'Jl. Ledok Dowo RT 6 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6285236327947', 'email' => 'istikomah@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Bakso Bu Lilik', 'jenis_usaha' => 'CIlok dan Bakso Pedas', 'owner_name' => 'Lilik Farida', 'address' => 'Jl. Ledok Dowo RT 6 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '62895425492255', 'email' => 'lilik.farida@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Catring', 'jenis_usaha' => 'Catring', 'owner_name' => 'Siti Khasana', 'address' => 'Jl. Ledok Dowo RT 6 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6282115069667', 'email' => 'siti.khasana@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Las Pak Dwi', 'jenis_usaha' => 'Buruh Las', 'owner_name' => 'Dwi Sulistyo', 'address' => 'Jl. Ledok Dowo RT 6 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6288989218375', 'email' => 'dwi.sulistyo@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Tempura Bu Sulastri', 'jenis_usaha' => 'Tempura + Minuman', 'owner_name' => 'Sulastri', 'address' => 'Jl. Ledok Dowo RT 6 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6288803440382', 'email' => 'sulastri@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Cilok Pak Sanali', 'jenis_usaha' => 'Cilok', 'owner_name' => 'Sanali', 'address' => 'Jl. Abdul Fatah RT 6 RW 1, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => null, 'email' => 'sanali@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Krupuk Bu Mali Ina', 'jenis_usaha' => 'Krupuk', 'owner_name' => 'Mali Ina', 'address' => 'Jl Karang Tengah RT 6 RW 2, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => null, 'email' => 'mali.ina@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Krupuk Bu Siti', 'jenis_usaha' => 'Krupuk', 'owner_name' => 'Siti Fatlukha', 'address' => 'Jl Karang Tengah RT 6 RW 2, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => null, 'email' => 'siti.fatlukha@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Es Campur Pak Hartono', 'jenis_usaha' => 'Jual Es Campur', 'owner_name' => 'Hartono', 'address' => 'Jl. Ledok Dowo RT 1 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => null, 'email' => 'hartono@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Pracangan Pak Purwanto', 'jenis_usaha' => 'Jual Pracangan', 'owner_name' => 'Purwanto', 'address' => 'Jl. Ledok Dowo RT 1 / RW 4, Pakisjajar, Pakis', 'phone' => '6281252590318', 'whatsapp' => null, 'email' => 'purwanto@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Toko Pak Sulingga', 'jenis_usaha' => 'Toko / Pracangan', 'owner_name' => 'Sulingga Sutrisno', 'address' => 'Jl. Ledok Dowo RT 1 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6282336441414', 'email' => 'sulingga.sutrisno@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Air Mineral Pak Dwi', 'jenis_usaha' => 'Air Mineral', 'owner_name' => 'Dwi Riyadiyanto', 'address' => 'Jl. Ledok Dowo RT 1 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6282264786687', 'email' => 'dwi.riyadiyanto@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Pangsit dan Mie Ayam Pak Mariyadi', 'jenis_usaha' => 'Jual Pangsit + Mie Ayam', 'owner_name' => 'Mariyadi', 'address' => 'Jl. Ledok Dowo RT 1 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6281231257925', 'email' => 'mariyadi@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Rujak Pak Sarto', 'jenis_usaha' => 'Jual Rujak', 'owner_name' => 'Sarto', 'address' => 'Jl. Ledok Dowo RT 1 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '62813343344995', 'email' => 'sarto@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Peracangan Bu Naimatus', 'jenis_usaha' => 'Jual Peracangan', 'owner_name' => 'Naimatus Solikhah', 'address' => 'Jl. Ledok Dowo RT 1 / RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6282231813916', 'email' => 'naimatus.solikhah@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Tambal Ban Pak Lukman', 'jenis_usaha' => 'Jual Bensin, Tambal Ban', 'owner_name' => 'Lukman Abdul Rochim', 'address' => 'Jl. Ledok Dowo RT 1 / RW 4, Pakisjajar, Pakis', 'phone' => '6288216821079', 'whatsapp' => '6288216821079', 'email' => 'lukman.abdul@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Jus Buah Bu Leni', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Leni Suyanti', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '628346404523', 'whatsapp' => '62881026147938', 'email' => 'lenisuyanti04@gmail.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Warung Pak Ali', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Pak Ali', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '628819591748', 'whatsapp' => null, 'email' => 'pak.ali@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Warung Bu Astutik', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Astutik', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '62895335237362', 'whatsapp' => null, 'email' => 'astutik@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Warung Bu Ratih', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Ratih Iga Mawarni', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '62895331103176', 'whatsapp' => '62895331103176', 'email' => 'ratih.iga@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Cuci Motor Pak Ardi', 'jenis_usaha' => 'Cuci Motor dan Karpet', 'owner_name' => 'M. Ardi Nuggroho', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '6282228648581', 'whatsapp' => null, 'email' => 'm.ardi@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Warung Bu Muliana', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Muliana', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '6282232600229', 'whatsapp' => '6282232600229', 'email' => 'mulianamlg@gmail.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Toko', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Silvia Damayanti', 'address' => 'Jl. Ledok Dowo Gang 3 RT 2 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '62895424814020', 'email' => 'silvia.damayanti@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Cilok Pak Khusnul', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Khusnul Hakim', 'address' => 'Dsn. Krajan RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '6289652943246', 'whatsapp' => null, 'email' => 'khusnul.hakim@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Laundry Isoku Iki', 'jenis_usaha' => 'Jasa', 'owner_name' => 'Hermin', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6283194171898', 'email' => 'hermin@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Telur Puyu Pak Ahmad Zaini', 'jenis_usaha' => 'Ternak Telur Puyu', 'owner_name' => 'Ahmad Zaini', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6287766747811', 'email' => 'ahmad.zaini@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Gorengan Bu Susiati', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Susiati', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '6287765498369', 'whatsapp' => null, 'email' => 'susiati@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Gado-gado Bu Siti', 'jenis_usaha' => 'Cilok, Gado-gado, Tahu Campur', 'owner_name' => 'Siti Khumakyah', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '6282228648581', 'whatsapp' => null, 'email' => 'siti.khumakyah@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Potong Rambut Bang Joe', 'jenis_usaha' => 'Jasa', 'owner_name' => 'Juwanto', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '6288989616144', 'whatsapp' => '6288989616144', 'email' => 'juantoazizah@gmail.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Q Ansho Allshop', 'jenis_usaha' => 'Pakaian dan Kosmetik', 'owner_name' => 'Lilik Mufidatin Azizah', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '6288989631600', 'whatsapp' => '6288989631600', 'email' => 'firdapandukhanza@gmail.com', 'ig' => null, 'shopee' => 'https://shopee.co.id/lilik_mufidaol'],
            ['umkm_name' => 'Warung Bu Lilis', 'jenis_usaha' => 'Makanan dan Minuman', 'owner_name' => 'Lilis Marianti', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '6281217549864', 'whatsapp' => '6281217549864', 'email' => 'lilis.marianti@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Penjahit Alfia', 'jenis_usaha' => 'Tekstil', 'owner_name' => 'Reti Kirana', 'address' => 'Jl. Ledok Dowo no. 60 RT 2 RW 4, Pakisjajar, Pakis', 'phone' => null, 'whatsapp' => '6287859080222', 'email' => 'reti.kirana@desawisatapakisjajar.com', 'ig' => 'alfiara-syari', 'shopee' => null],
            ['umkm_name' => 'Pakan Burung Bu Siti', 'jenis_usaha' => 'Jual Pakan Burung', 'owner_name' => 'Siti Amina', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '6281337301574', 'whatsapp' => '6281237100588', 'email' => 'siti.amina@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Jasa Roicha', 'jenis_usaha' => 'Jasa', 'owner_name' => 'Roicha', 'address' => 'Jl. Ledok Dowo RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '6282131901505', 'whatsapp' => '6282131901505', 'email' => 'roicha@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'Nasi Jagung Bu Neyla', 'jenis_usaha' => 'Jualan Nasi Jagung, Nasi Kuning, Sayuran Matang', 'owner_name' => 'Neyla Indar Wati', 'address' => 'Jl. Ledok Dowo No. 59 RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '628104444402', 'whatsapp' => '628104444402', 'email' => 'neyla.indar@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
            ['umkm_name' => 'UMKM Bu Feni', 'jenis_usaha' => 'UMKM', 'owner_name' => 'Feni Wahyuningsih', 'address' => 'Jl. Ledok Dowo No. 57 RT 2 RW 4, Pakisjajar, Pakis', 'phone' => '6281252604336', 'whatsapp' => '6281252604336', 'email' => 'feni.wahyuningsih@desawisatapakisjajar.com', 'ig' => null, 'shopee' => null],
        ];

        $created = 0;

        collect($umkms)
            ->each(function ($umkm) use (&$created) {

                if (User::where('email', $umkm['email'])->exists()) return;

                $user = User::create([
                    'name' => $umkm['owner_name'],
                    'email' => $umkm['email'],
                    'password' => Hash::make('pakisjajar123'),
                ]);

                Umkm::create([
                    'name' => $umkm['umkm_name'],
                    'jenis_usaha' => $umkm['jenis_usaha'],
                    'address' => $umkm['address'],
                    'phone' => $umkm['phone'],
                    'whatsapp' => $umkm['whatsapp'],
                    'ig' => $umkm['ig'],
                    'shopee' => $umkm['shopee'],
                    'owner_id' => $user->id,
                ]);

                $created++;
            });

        $this->command->info("$created umkms created, " . count($umkms) - $created . " skipped.");
    }
}
